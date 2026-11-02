<?php
/**
 * Hardened Browser-to-Server Event Handshake Endpoint for Meta Conversions API
 *
 * Receives asynchronous, non-blocking telemetry beacons from meta-events.js
 * for PageView, ViewContent, and InitiateCheckout.
 *
 * Security & Anti-Abuse Hardening:
 * - Session-bound tracking nonce required (protects against unauthenticated automated spam)
 * - Strict whitelist of allowable events: PageView, ViewContent, InitiateCheckout
 * - PURCHASE IS STRICTLY PROHIBITED (Purchase is backend-authoritative only in submit-order.php)
 * - Session-level idempotency prevents duplicate CAPI transmissions for the same page session
 * - Session rate-limiting restricts request flood
 * - Origin / Referer validation against local host
 * - Zero database schema modifications required
 * - Completely non-blocking: failure to reach Meta never impedes user checkout
 */

// Disable error display to guarantee valid JSON responses
ini_set('display_errors', '0');
error_reporting(E_ALL);

session_start();

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('X-Content-Type-Options: nosniff');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'error' => 'Method Not Allowed']);
    exit;
}

// 1. Validate Origin / Referer against host to prevent cross-origin abuse
$host = $_SERVER['HTTP_HOST'] ?? '';
if (!empty($_SERVER['HTTP_ORIGIN']) && !empty($host)) {
    $originHost = parse_url($_SERVER['HTTP_ORIGIN'], PHP_URL_HOST);
    if ($originHost && strtolower($originHost) !== strtolower(explode(':', $host)[0])) {
        http_response_code(403);
        echo json_encode(['success' => false, 'error' => 'Forbidden origin']);
        exit;
    }
}

// 2. Parse JSON Request Body
$rawBody = file_get_contents('php://input');
if (empty($rawBody)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Empty request body']);
    exit;
}

$data = json_decode($rawBody, true);
if (!is_array($data)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Invalid JSON']);
    exit;
}

$eventName = trim((string)($data['event_name'] ?? ''));
$eventId   = trim((string)($data['event_id'] ?? ''));
$nonce     = trim((string)($data['tracking_nonce'] ?? ''));

// 3. Whitelist check: strictly PageView, ViewContent, InitiateCheckout. Purchase is NEVER accepted.
$allowedEvents = ['PageView', 'ViewContent', 'InitiateCheckout'];
if (!in_array($eventName, $allowedEvents, true)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'Unsupported or prohibited event']);
    exit;
}

// 4. Session & Nonce Validation
$sessionNonce = trim((string)($_SESSION['meta_tracking_nonce'] ?? ''));
if (empty($sessionNonce) || empty($nonce) || !hash_equals($sessionNonce, $nonce)) {
    http_response_code(403);
    echo json_encode(['success' => false, 'error' => 'Invalid or expired tracking session']);
    exit;
}

// 5. Authorized Event ID Validation (ensures event_id was generated authoritatively in session)
$allowedEventId = $_SESSION['meta_allowed_events'][$eventName] ?? '';
if (empty($allowedEventId) || !hash_equals($allowedEventId, $eventId)) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Unauthorized or mismatched event_id']);
    exit;
}

// 6. Rate Limiting per Session (max 10 handshake requests per session)
$_SESSION['meta_handshake_count'] = ($_SESSION['meta_handshake_count'] ?? 0) + 1;
if ($_SESSION['meta_handshake_count'] > 10) {
    http_response_code(429);
    echo json_encode(['success' => false, 'error' => 'Rate limit exceeded']);
    exit;
}

// 7. Idempotency Check: Each lifecycle event fires to CAPI at most once per session pageview
if (!empty($_SESSION['meta_dispatched_events'][$eventName])) {
    http_response_code(200);
    echo json_encode([
        'success' => true,
        'status'  => 'already_dispatched',
        'event'   => $eventName,
        'event_id'=> $eventId,
    ]);
    exit;
}

// Mark event as dispatched in session before calling Meta to prevent concurrent races
$_SESSION['meta_dispatched_events'][$eventName] = true;

// 8. Dispatch Server Event to Meta CAPI
require_once __DIR__ . '/meta-capi.php';

$params = [
    'event_id'    => $eventId,
    'source_url'  => $data['source_url'] ?? null,
    'custom_data' => is_array($data['custom_data'] ?? null) ? $data['custom_data'] : [],
    'fbp'         => $data['fbp'] ?? null,
    'fbc'         => $data['fbc'] ?? null,
    'phone'       => $data['phone'] ?? null,
    'name'        => $data['name'] ?? null,
];

$result = ['success' => false];

try {
    switch ($eventName) {
        case 'PageView':
            $result = meta_send_capi_pageview($params);
            break;
        case 'ViewContent':
            $result = meta_send_capi_view_content($params);
            break;
        case 'InitiateCheckout':
            $result = meta_send_capi_initiate_checkout($params);
            break;
    }
} catch (\Throwable $e) {
    error_log(sprintf('Meta CAPI handshake endpoint exception: %s', $e->getMessage()));
    $result = ['success' => false, 'error' => 'Internal error'];
}

// Always return HTTP 200 with JSON to avoid breaking client-side beacon
http_response_code(200);
echo json_encode([
    'success' => $result['success'] ?? false,
    'event'   => $eventName,
    'event_id'=> $eventId,
]);
exit;

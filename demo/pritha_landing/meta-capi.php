<?php
/**
 * Meta Conversions API (CAPI) Client & Normalization Engine
 *
 * Implements authoritative server-side event tracking for Meta:
 * - PageView, ViewContent, InitiateCheckout, and Purchase
 * - Robust visitor public IP resolution (prefers REMOTE_ADDR; ignores unverified proxies)
 * - Meta-compliant identifier normalization (phone, name, country) + SHA-256 hashing
 * - Unhashed client IP, User-Agent, _fbp, and _fbc support
 * - Deterministic, shared event IDs matching browser Pixel (pv_*, vc_*, ic_*, purchase_*)
 * - Privacy-safe customer external_id derived from normalized phone (never order_<id>)
 * - Non-blocking transport with short timeouts (CAPI failure never halts user experience)
 * - Safe error logging with credentials and PII redacted
 */

require_once __DIR__ . '/meta-config.php';

/**
 * Check if an IP matches a CIDR range or exact IP.
 */
function meta_ip_matches(string $ip, string $range): bool
{
    $range = trim($range);
    if ($ip === $range) {
        return true;
    }

    if (strpos($range, '/') === false) {
        return false;
    }

    list($subnet, $bits) = explode('/', $range, 2);
    $bits = (int) $bits;

    // IPv4 CIDR check
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) && filter_var($subnet, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        if ($bits < 0 || $bits > 32) {
            return false;
        }
        $ipLong = ip2long($ip);
        $subnetLong = ip2long($subnet);
        $mask = -1 << (32 - $bits);
        return ($ipLong & $mask) === ($subnetLong & $mask);
    }

    // IPv6 CIDR check
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) && filter_var($subnet, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
        $ipBin = inet_pton($ip);
        $subnetBin = inet_pton($subnet);
        if ($ipBin === false || $subnetBin === false || $bits < 0 || $bits > 128) {
            return false;
        }

        $bytes = intdiv($bits, 8);
        $remainingBits = $bits % 8;

        if ($bytes > 0 && substr($ipBin, 0, $bytes) !== substr($subnetBin, 0, $bytes)) {
            return false;
        }

        if ($remainingBits > 0) {
            $mask = chr(0xFF << (8 - $remainingBits));
            if (($ipBin[$bytes] & $mask) !== ($subnetBin[$bytes] & $mask)) {
                return false;
            }
        }

        return true;
    }

    return false;
}

/**
 * Check if an IP is in an allowlist of trusted proxies.
 */
function meta_is_trusted_proxy(string $ip, array $trustedList): bool
{
    foreach ($trustedList as $trusted) {
        if (meta_ip_matches($ip, $trusted)) {
            return true;
        }
    }
    return false;
}

/**
 * Determine the real visitor public IP.
 *
 * Rules:
 * - On direct Apache (default), REMOTE_ADDR is authoritative.
 * - SERVER_ADDR and local loopback IPs are NEVER used as visitor IP.
 * - Forwarded headers (CF-Connecting-IP, X-Forwarded-For) are ONLY inspected
 *   if REMOTE_ADDR is in META_TRUSTED_PROXIES.
 */
function meta_get_client_ip(): string
{
    $remoteAddr = $_SERVER['REMOTE_ADDR'] ?? '';
    if (!filter_var($remoteAddr, FILTER_VALIDATE_IP)) {
        return '';
    }

    $trustedProxies = [];
    if (defined('META_TRUSTED_PROXIES') && is_string(META_TRUSTED_PROXIES)) {
        $unserialized = @unserialize(META_TRUSTED_PROXIES);
        if (is_array($unserialized)) {
            $trustedProxies = $unserialized;
        }
    }

    // If no trusted proxies configured, or REMOTE_ADDR is not trusted, use REMOTE_ADDR directly
    if (empty($trustedProxies) || !meta_is_trusted_proxy($remoteAddr, $trustedProxies)) {
        return $remoteAddr;
    }

    // REMOTE_ADDR is a trusted proxy. Check proxy-forwarded headers in priority order:
    $headerCandidates = [
        $_SERVER['HTTP_CF_CONNECTING_IP'] ?? '',
        $_SERVER['HTTP_TRUE_CLIENT_IP'] ?? '',
        $_SERVER['HTTP_X_FORWARDED_FOR'] ?? '',
    ];

    foreach ($headerCandidates as $rawHeader) {
        if (empty($rawHeader)) {
            continue;
        }

        $ips = array_map('trim', explode(',', $rawHeader));
        foreach ($ips as $ip) {
            if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
                return $ip;
            }
        }
    }

    return $remoteAddr;
}

/**
 * SHA-256 hash a normalized string per Meta specification.
 */
function meta_hash(?string $value): ?string
{
    if ($value === null) {
        return null;
    }
    $trimmed = trim(strtolower($value));
    if ($trimmed === '') {
        return null;
    }
    return hash('sha256', $trimmed);
}

/**
 * Normalize a phone number to Meta's expected format (country code + number, digits only).
 * Specifically handles Bangladesh numbers (01[3-9]XXXXXXXX -> 8801[3-9]XXXXXXXX).
 */
function meta_normalize_phone(?string $phone): string
{
    if (empty($phone)) {
        return '';
    }

    $digits = preg_replace('/\D+/', '', (string)$phone);
    if (empty($digits)) {
        return '';
    }

    // BD 11-digit format starting with 01: 01712345678 -> 8801712345678
    if (preg_match('/^01[3-9]\d{8}$/', $digits)) {
        return '880' . substr($digits, 1);
    }

    // BD 13-digit format already starting with 8801
    if (preg_match('/^8801[3-9]\d{8}$/', $digits)) {
        return $digits;
    }

    return $digits;
}

/**
 * Split a customer full name into first name (fn) and last name (ln).
 * Never manufactures a fake last name.
 */
function meta_normalize_name(?string $fullName): array
{
    $result = ['fn' => '', 'ln' => ''];
    if (empty($fullName)) {
        return $result;
    }

    // Strip punctuation, normalize whitespace
    $clean = preg_replace('/[^\p{L}\p{N}\s]/u', '', (string)$fullName);
    $clean = preg_replace('/\s+/', ' ', trim($clean));
    if (empty($clean)) {
        return $result;
    }

    $parts = explode(' ', $clean);
    if (count($parts) === 1) {
        $result['fn'] = mb_strtolower($parts[0], 'UTF-8');
    } else {
        $result['fn'] = mb_strtolower(array_shift($parts), 'UTF-8');
        $result['ln'] = mb_strtolower(implode(' ', $parts), 'UTF-8');
    }

    return $result;
}

/**
 * Retrieve the Meta _fbp cookie value.
 * Accepts optional data array from JSON payload, or inspects $_POST and $_COOKIE.
 */
function meta_get_fbp(?array $data = null): ?string
{
    $candidates = [
        $data['fbp'] ?? '',
        $data['meta_fbp'] ?? '',
        $_POST['meta_fbp'] ?? '',
        $_COOKIE['_fbp'] ?? '',
    ];

    foreach ($candidates as $cand) {
        $val = trim((string)$cand);
        if (preg_match('/^fb\.1\.\d+\.\d+$/', $val)) {
            return $val;
        }
    }

    return null;
}

/**
 * Retrieve or generate the Meta _fbc cookie value.
 * If _fbc is missing but fbclid is available, generates a valid fbc value.
 */
function meta_get_fbc(?array $data = null): ?string
{
    $fbcSources = [
        $data['fbc'] ?? '',
        $data['meta_fbc'] ?? '',
        $_POST['meta_fbc'] ?? '',
        $_COOKIE['_fbc'] ?? '',
    ];

    foreach ($fbcSources as $raw) {
        $candidate = trim((string)$raw);
        if (!empty($candidate) && strpos($candidate, 'fb.1.') === 0) {
            return $candidate;
        }
    }

    // Synthesize from fbclid if available
    $fbclid = $data['fbclid'] ?? $data['meta_fbclid'] ?? $_GET['fbclid'] ?? $_POST['meta_fbclid'] ?? $_POST['fbclid'] ?? '';
    $cleanFbclid = preg_replace('/[^a-zA-Z0-9_\-\.]/', '', (string)$fbclid);
    if (!empty($cleanFbclid)) {
        return 'fb.1.' . (time() * 1000) . '.' . $cleanFbclid;
    }

    return null;
}

/**
 * Resolve the current canonical website source URL for events.
 */
function meta_get_source_url(?string $customUrl = null): string
{
    if (!empty($customUrl) && filter_var($customUrl, FILTER_VALIDATE_URL)) {
        return $customUrl;
    }

    $scheme = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host = $_SERVER['HTTP_HOST'] ?? 'prithaenterprise.io';
    $uri = $_SERVER['REQUEST_URI'] ?? '/index.php';

    return $scheme . '://' . $host . $uri;
}

/**
 * Centralized User Data Builder for Meta CAPI.
 *
 * Rules:
 * - client_ip_address: unhashed
 * - client_user_agent: unhashed
 * - fbp: unhashed
 * - fbc: unhashed
 * - country: hashed ('bd')
 * - ph: normalized + hashed
 * - fn: normalized + hashed
 * - ln: normalized + hashed (only if valid)
 * - external_id: hashed normalized phone (stable first-party customer identifier; never order_<id>)
 */
function meta_build_user_data(array $params = []): array
{
    $userData = [];

    // Client IP (unhashed)
    $clientIp = meta_get_client_ip();
    if (!empty($clientIp)) {
        $userData['client_ip_address'] = $clientIp;
    }

    // Client User-Agent (unhashed)
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
    if (!empty($userAgent)) {
        $userData['client_user_agent'] = $userAgent;
    }

    // FBP (unhashed)
    $fbp = meta_get_fbp($params);
    if (!empty($fbp)) {
        $userData['fbp'] = $fbp;
    }

    // FBC (unhashed)
    $fbc = meta_get_fbc($params);
    if (!empty($fbc)) {
        $userData['fbc'] = $fbc;
    }

    // Country (Bangladesh = bd, hashed)
    $hashedCountry = meta_hash('bd');
    if ($hashedCountry) {
        $userData['country'] = [$hashedCountry];
    }

    // Phone (normalized + hashed)
    $rawPhone = $params['phone'] ?? '';
    $normalizedPhone = meta_normalize_phone($rawPhone);
    if (!empty($normalizedPhone)) {
        $hashedPhone = meta_hash($normalizedPhone);
        if ($hashedPhone) {
            $userData['ph'] = [$hashedPhone];
        }

        // External ID: derived from stable normalized customer phone identifier
        // Hashed per Meta requirements. Never uses order_<id>.
        $hashedExternalId = meta_hash($normalizedPhone);
        if ($hashedExternalId) {
            $userData['external_id'] = [$hashedExternalId];
        }
    }

    // Name (fn / ln, hashed)
    $rawName = $params['name'] ?? '';
    $nameParts = meta_normalize_name($rawName);
    if (!empty($nameParts['fn'])) {
        $hashedFn = meta_hash($nameParts['fn']);
        if ($hashedFn) {
            $userData['fn'] = [$hashedFn];
        }
    }
    if (!empty($nameParts['ln'])) {
        $hashedLn = meta_hash($nameParts['ln']);
        if ($hashedLn) {
            $userData['ln'] = [$hashedLn];
        }
    }

    return $userData;
}

/**
 * Send a server-side event to Meta Conversions API via cURL.
 *
 * @param array $eventPayload Single event structure
 * @return array ['success' => bool, 'message' => string, 'code' => int]
 */
function meta_send_capi_event(array $eventPayload): array
{
    $pixelId = defined('META_PIXEL_ID') ? META_PIXEL_ID : '';
    $token = defined('META_CAPI_ACCESS_TOKEN') ? META_CAPI_ACCESS_TOKEN : '';
    $version = defined('META_GRAPH_API_VERSION') ? META_GRAPH_API_VERSION : 'v21.0';
    $testCode = defined('META_TEST_EVENT_CODE') ? META_TEST_EVENT_CODE : '';

    if (empty($pixelId)) {
        return ['success' => false, 'message' => 'META_PIXEL_ID not configured', 'code' => 0];
    }

    if (empty($token)) {
        error_log('Meta CAPI: META_CAPI_ACCESS_TOKEN is not configured. Server event skipped.');
        return ['success' => false, 'message' => 'META_CAPI_ACCESS_TOKEN not configured', 'code' => 0];
    }

    $requestBody = [
        'data' => [$eventPayload],
    ];

    if (!empty($testCode)) {
        $requestBody['test_event_code'] = $testCode;
    }

    $jsonBody = json_encode($requestBody, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    if ($jsonBody === false) {
        return ['success' => false, 'message' => 'JSON encoding failed', 'code' => 0];
    }

    $endpoint = sprintf(
        'https://graph.facebook.com/%s/%s/events',
        rawurlencode($version),
        rawurlencode($pixelId)
    );

    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $endpoint,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $jsonBody,
        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json',
            'Accept: application/json',
            'Authorization: Bearer ' . $token,
            'User-Agent: PrithaEnterprise-CAPI/1.0',
        ],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CONNECTTIMEOUT => 2,
        CURLOPT_TIMEOUT => 4,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
    ]);

    try {
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlError = curl_error($ch);
        curl_close($ch);

        if ($response === false || !empty($curlError)) {
            error_log(sprintf(
                'Meta CAPI transport error: %s (event: %s, event_id: %s)',
                $curlError ?: 'unknown error',
                $eventPayload['event_name'] ?? 'unknown',
                $eventPayload['event_id'] ?? 'unknown'
            ));
            return ['success' => false, 'message' => $curlError, 'code' => 0];
        }

        $decoded = json_decode($response, true);
        if ($httpCode >= 200 && $httpCode < 300) {
            $eventsReceived = $decoded['events_received'] ?? 1;
            error_log(sprintf(
                'Meta CAPI success: event %s (id: %s, received: %d)',
                $eventPayload['event_name'] ?? 'Event',
                $eventPayload['event_id'] ?? 'unknown',
                $eventsReceived
            ));
            return ['success' => true, 'message' => 'Event accepted', 'code' => $httpCode];
        }

        $errorMsg = $decoded['error']['message'] ?? 'API error';
        $errorType = $decoded['error']['type'] ?? 'Unknown';
        error_log(sprintf(
            'Meta CAPI API error [%d]: %s (%s) (event: %s, event_id: %s)',
            $httpCode,
            $errorMsg,
            $errorType,
            $eventPayload['event_name'] ?? 'unknown',
            $eventPayload['event_id'] ?? 'unknown'
        ));

        return ['success' => false, 'message' => $errorMsg, 'code' => $httpCode];
    } catch (\Throwable $t) {
        if (is_resource($ch)) {
            curl_close($ch);
        }
        error_log(sprintf('Meta CAPI exception: %s', $t->getMessage()));
        return ['success' => false, 'message' => $t->getMessage(), 'code' => 0];
    }
}

/**
 * Dispatch a server-side PageView event to Meta Conversions API.
 *
 * @param array $params ['event_id' => string, 'source_url' => ?string, 'fbp' => ?string, 'fbc' => ?string]
 * @return array Result of CAPI delivery
 */
function meta_send_capi_pageview(array $params): array
{
    $eventId = trim((string)($params['event_id'] ?? ''));
    if ($eventId === '') {
        return ['success' => false, 'message' => 'Missing event_id', 'code' => 0];
    }

    $sourceUrl = meta_get_source_url($params['source_url'] ?? null);
    $userData = meta_build_user_data($params);

    $eventPayload = [
        'event_name' => 'PageView',
        'event_time' => time(),
        'event_id' => $eventId,
        'event_source_url' => $sourceUrl,
        'action_source' => 'website',
        'user_data' => $userData,
        'custom_data' => $params['custom_data'] ?? new \stdClass(),
    ];

    return meta_send_capi_event($eventPayload);
}

/**
 * Dispatch a server-side ViewContent event to Meta Conversions API.
 *
 * @param array $params ['event_id' => string, 'custom_data' => ?array, ...]
 * @return array Result of CAPI delivery
 */
function meta_send_capi_view_content(array $params): array
{
    $eventId = trim((string)($params['event_id'] ?? ''));
    if ($eventId === '') {
        return ['success' => false, 'message' => 'Missing event_id', 'code' => 0];
    }

    $sourceUrl = meta_get_source_url($params['source_url'] ?? null);
    $userData = meta_build_user_data($params);

    $productId = defined('META_DEFAULT_PRODUCT_ID') ? META_DEFAULT_PRODUCT_ID : 'mahashankar-oral-care-combo';
    $productName = defined('META_DEFAULT_PRODUCT_NAME') ? META_DEFAULT_PRODUCT_NAME : 'Mahashankar Oral Care Combo';
    $unitPrice = defined('META_DEFAULT_UNIT_PRICE') ? (float)META_DEFAULT_UNIT_PRICE : 900.00;
    $currency = defined('META_CURRENCY') ? META_CURRENCY : 'BDT';

    $incomingCustom = $params['custom_data'] ?? [];
    $customData = [
        'content_type' => 'product',
        'content_name' => $incomingCustom['content_name'] ?? $productName,
        'content_ids' => $incomingCustom['content_ids'] ?? [$productId],
        'value' => (float)($incomingCustom['value'] ?? $unitPrice),
        'currency' => $incomingCustom['currency'] ?? $currency,
        'contents' => $incomingCustom['contents'] ?? [
            [
                'id' => $productId,
                'quantity' => 1,
                'item_price' => $unitPrice,
            ],
        ],
    ];

    $eventPayload = [
        'event_name' => 'ViewContent',
        'event_time' => time(),
        'event_id' => $eventId,
        'event_source_url' => $sourceUrl,
        'action_source' => 'website',
        'user_data' => $userData,
        'custom_data' => $customData,
    ];

    return meta_send_capi_event($eventPayload);
}

/**
 * Dispatch a server-side InitiateCheckout event to Meta Conversions API.
 *
 * @param array $params ['event_id' => string, 'custom_data' => ?array, ...]
 * @return array Result of CAPI delivery
 */
function meta_send_capi_initiate_checkout(array $params): array
{
    $eventId = trim((string)($params['event_id'] ?? ''));
    if ($eventId === '') {
        return ['success' => false, 'message' => 'Missing event_id', 'code' => 0];
    }

    $sourceUrl = meta_get_source_url($params['source_url'] ?? null);
    $userData = meta_build_user_data($params);

    $productId = defined('META_DEFAULT_PRODUCT_ID') ? META_DEFAULT_PRODUCT_ID : 'mahashankar-oral-care-combo';
    $productName = defined('META_DEFAULT_PRODUCT_NAME') ? META_DEFAULT_PRODUCT_NAME : 'Mahashankar Oral Care Combo';
    $unitPrice = defined('META_DEFAULT_UNIT_PRICE') ? (float)META_DEFAULT_UNIT_PRICE : 900.00;
    $currency = defined('META_CURRENCY') ? META_CURRENCY : 'BDT';

    $incomingCustom = $params['custom_data'] ?? [];
    $quantity = max(1, (int)($incomingCustom['num_items'] ?? 1));
    $value = (float)($incomingCustom['value'] ?? ($unitPrice * $quantity));

    $customData = [
        'content_type' => 'product',
        'content_name' => $incomingCustom['content_name'] ?? $productName,
        'content_ids' => $incomingCustom['content_ids'] ?? [$productId],
        'value' => round($value, 2),
        'currency' => $incomingCustom['currency'] ?? $currency,
        'num_items' => $quantity,
        'contents' => $incomingCustom['contents'] ?? [
            [
                'id' => $productId,
                'quantity' => $quantity,
                'item_price' => $unitPrice,
            ],
        ],
    ];

    $eventPayload = [
        'event_name' => 'InitiateCheckout',
        'event_time' => time(),
        'event_id' => $eventId,
        'event_source_url' => $sourceUrl,
        'action_source' => 'website',
        'user_data' => $userData,
        'custom_data' => $customData,
    ];

    return meta_send_capi_event($eventPayload);
}

/**
 * Dispatch an authoritative Purchase event to Meta Conversions API.
 * Fired ONLY backend-authoritatively after successful order creation.
 *
 * @param array $order [
 *   'order_id'       => string,
 *   'name'           => string,
 *   'phone'          => string,
 *   'address'        => string,
 *   'quantity'       => int,
 *   'unit_price'     => float,
 *   'total'          => float,
 * ]
 * @return array Result of CAPI delivery
 */
function meta_send_capi_purchase(array $order): array
{
    $orderId = trim((string)($order['order_id'] ?? ''));
    if ($orderId === '') {
        return ['success' => false, 'message' => 'Missing order_id', 'code' => 0];
    }

    $eventId = 'purchase_' . $orderId;
    $sourceUrl = meta_get_source_url(
        (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http')
        . '://' . ($_SERVER['HTTP_HOST'] ?? 'prithaenterprise.io')
        . '/index.php?order_id=' . rawurlencode($orderId)
    );

    // Build user_data adhering strictly to Meta normalization/hash rules
    $userData = meta_build_user_data($order);

    // Build custom_data
    $quantity = max(1, (int)($order['quantity'] ?? 1));
    $unitPrice = (float)($order['unit_price'] ?? (defined('META_DEFAULT_UNIT_PRICE') ? META_DEFAULT_UNIT_PRICE : 900.00));
    $total = (float)($order['total'] ?? ($unitPrice * $quantity));
    $productId = defined('META_DEFAULT_PRODUCT_ID') ? META_DEFAULT_PRODUCT_ID : 'mahashankar-oral-care-combo';
    $productName = defined('META_DEFAULT_PRODUCT_NAME') ? META_DEFAULT_PRODUCT_NAME : 'Mahashankar Oral Care Combo';
    $currency = defined('META_CURRENCY') ? META_CURRENCY : 'BDT';

    $customData = [
        'currency' => $currency,
        'value' => round($total, 2),
        'order_id' => $orderId,
        'content_type' => 'product',
        'content_name' => $productName,
        'content_ids' => [$productId],
        'contents' => [
            [
                'id' => $productId,
                'quantity' => $quantity,
                'item_price' => round($unitPrice, 2),
            ],
        ],
        'num_items' => $quantity,
    ];

    $eventPayload = [
        'event_name' => 'Purchase',
        'event_time' => time(),
        'event_id' => $eventId,
        'event_source_url' => $sourceUrl,
        'action_source' => 'website',
        'user_data' => $userData,
        'custom_data' => $customData,
    ];

    return meta_send_capi_event($eventPayload);
}

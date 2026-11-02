<?php
/**
 * Meta Conversions API & Pixel Configuration
 *
 * For security, do NOT place production access tokens directly in public version control.
 *
 * RECOMMENDED SECRETS STORAGE:
 * 1. Web server / Apache environment variables (e.g. SetEnv META_CAPI_ACCESS_TOKEN "...")
 * 2. PHP config outside the public document root (e.g. ../meta-config.local.php)
 *
 * FALLBACK (RISK DISCLOSURE):
 * A local file `meta-config.local.php` in this directory is supported as a fallback.
 * Risk: If the web server PHP engine fails or configuration changes, files in the document
 * root could theoretically be served as plaintext. An .htaccess rule is provided to deny
 * direct access to *.local.php, but storing credentials outside document root or via
 * server environment variables is far safer.
 */

if (!defined('PRITHA_META_LOADED')) {
    define('PRITHA_META_LOADED', true);
}

// 1. Load config from parent directory (outside public document root) if present
$parentConfigPath = dirname(__DIR__) . '/meta-config.local.php';
if (file_exists($parentConfigPath)) {
    require_once $parentConfigPath;
}

// 2. Load fallback local config if present
$localConfigPath = __DIR__ . '/meta-config.local.php';
if (file_exists($localConfigPath)) {
    require_once $localConfigPath;
}

/**
 * Safe environment lookup across getenv(), $_ENV, and $_SERVER.
 */
if (!function_exists('meta_get_env_val')) {
    function meta_get_env_val(string $name, string $default = ''): string
    {
        $val = getenv($name);
        if ($val !== false && $val !== '') {
            return (string)$val;
        }
        if (!empty($_ENV[$name])) {
            return (string)$_ENV[$name];
        }
        if (!empty($_SERVER[$name])) {
            return (string)$_SERVER[$name];
        }
        return $default;
    }
}

// Meta Pixel ID (Authoritative)
defined('META_PIXEL_ID') || define(
    'META_PIXEL_ID',
    meta_get_env_val('META_PIXEL_ID', '3555032114661518')
);

// Meta Conversions API Access Token
// Priority: local config constant > environment variable > empty string
defined('META_CAPI_ACCESS_TOKEN') || define(
    'META_CAPI_ACCESS_TOKEN',
    meta_get_env_val('META_CAPI_ACCESS_TOKEN', '')
);

// Meta Graph API Version
// Configurable via META_GRAPH_API_VERSION env variable or config constant.
// NOTE: Verify the currently supported Meta Graph API version in Meta docs before deploying.
defined('META_GRAPH_API_VERSION') || define(
    'META_GRAPH_API_VERSION',
    meta_get_env_val('META_GRAPH_API_VERSION', 'v21.0')
);

// Optional Meta Test Event Code (Events Manager > Test Events)
defined('META_TEST_EVENT_CODE') || define(
    'META_TEST_EVENT_CODE',
    meta_get_env_val('META_TEST_EVENT_CODE', '')
);

// List of trusted reverse proxy IPs / CIDRs.
// If direct Apache receives visitor traffic (the default), leave this array EMPTY.
// When empty, REMOTE_ADDR is treated as the visitor public IP.
// NEVER add untrusted proxies, as forwarded headers can be spoofed.
if (!defined('META_TRUSTED_PROXIES')) {
    define('META_TRUSTED_PROXIES', serialize([]));
}

// Default product & currency settings
defined('META_CURRENCY') || define('META_CURRENCY', 'BDT');
defined('META_DEFAULT_PRODUCT_ID') || define('META_DEFAULT_PRODUCT_ID', 'mahashankar-oral-care-combo');
defined('META_DEFAULT_PRODUCT_NAME') || define('META_DEFAULT_PRODUCT_NAME', 'Mahashankar Oral Care Combo');
defined('META_DEFAULT_UNIT_PRICE') || define('META_DEFAULT_UNIT_PRICE', 900.00);

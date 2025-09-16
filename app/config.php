<?php
// URL de base et chemins d'assets basés uniquement sur le point d'entrée web
$scriptName = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : '';
$baseDir = rtrim(str_replace('\\', '/', dirname($scriptName)), '/');
if ($baseDir === '/') { $baseDir = ''; }

if (!defined('ROOT_URL')) define('ROOT_URL', $baseDir);
if (!defined('ASSETS_URL')) define('ASSETS_URL', ROOT_URL . '/assets');

// --- Configuration base de données ---
if (!function_exists('zypp_env')) {
    function zypp_env($key, $default = null) {
        $val = getenv($key);
        if ($val === false || $val === '') {
            return $default;
        }
        return $val;
    }
}

if (!defined('DB_HOST')) define('DB_HOST', zypp_env('DB_HOST', 'localhost'));
if (!defined('DB_NAME')) define('DB_NAME', zypp_env('DB_NAME', 'zypp'));
if (!defined('DB_USER')) define('DB_USER', zypp_env('DB_USER', 'root'));
if (!defined('DB_PASS')) define('DB_PASS', zypp_env('DB_PASS', ''));
if (!defined('DB_CHARSET')) define('DB_CHARSET', zypp_env('DB_CHARSET', 'utf8'));

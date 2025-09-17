<?php
// URL de base et chemins d'assets basés uniquement sur le point d'entrée web
$scriptName = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : '';
$scriptDir = rtrim(str_replace('\\', '/', dirname($scriptName)), '/');
if ($scriptDir === '/') { $scriptDir = ''; }
$baseDir = $scriptDir;

// ROOT_URL reste basé sur le script courant
if (!defined('ROOT_URL')) define('ROOT_URL', $baseDir);

// Détection intelligente des assets selon l'environnement
$assetBase = $baseDir;

// Si on est dans /public, utiliser les assets de public, sinon ceux de la racine
if (substr($assetBase, -7) === '/public') {
    // On est dans public/, utiliser les assets de public/
    if (!defined('ASSETS_URL')) define('ASSETS_URL', $assetBase . '/assets');
} else {
    // On est à la racine, utiliser les assets de la racine
    if (!defined('ASSETS_URL')) define('ASSETS_URL', $assetBase . '/assets');
}

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

// Charger les variables d'environnement depuis un fichier .env s'il existe
$envPath = dirname(__DIR__) . '/.env';
if (file_exists($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = array_map('trim', explode('=', $line, 2));
        if (!getenv($name)) {
            putenv("{$name}={$value}");
            $_ENV[$name] = $value;
        }
    }
}

if (!defined('DB_HOST')) define('DB_HOST', zypp_env('DB_HOST', 'localhost'));
if (!defined('DB_NAME')) define('DB_NAME', zypp_env('DB_NAME', 'zypp'));
if (!defined('DB_USER')) define('DB_USER', zypp_env('DB_USER', 'root'));
if (!defined('DB_PASS')) define('DB_PASS', zypp_env('DB_PASS', ''));
if (!defined('DB_PORT')) define('DB_PORT', zypp_env('DB_PORT', '3306'));
if (!defined('DB_CHARSET')) define('DB_CHARSET', zypp_env('DB_CHARSET', 'utf8'));

<?php
// Détection robuste de l'URL de base et des chemins d'accès aux assets en fonction du point d'entrée
$scriptName = $_SERVER['SCRIPT_NAME'] ?? '';
$scriptDir = rtrim(str_replace('\\', '/', dirname($scriptName)), '/');

// Si le script est servi depuis /public, on expose les assets en "/assets" à la racine web
$servedFromPublic = (substr($scriptDir, -7) === '/public');
$base = $servedFromPublic ? rtrim(dirname($scriptDir), '/') : $scriptDir; // ex: "/Zypp" ou ""

$root = ($base === '' || $base === '/') ? '' : $base;

// ROOT_URL pour les routes (pages), ASSETS_URL pour les fichiers statiques (css, js, images)
define('ROOT_URL', $root);
// Si servi depuis /public, les assets sont accessibles via "/assets" (docroot = public)
// Sinon, ils sont sous "{ROOT_URL}/assets"
define('ASSETS_URL', ($servedFromPublic ? '' : $root) . '/assets');

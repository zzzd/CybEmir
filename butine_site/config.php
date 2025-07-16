<?php
// Configuration générale
define('DEBUG_MODE', true);

// Détection automatique de l'URL de base
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';
$host = $_SERVER['HTTP_HOST'];
$scriptName = $_SERVER['SCRIPT_NAME'];
$basePath = dirname($scriptName);

// Nettoyer le chemin de base
if ($basePath === '/' || $basePath === '\\') {
    $basePath = '';
}

// Construire l'URL de base
define('BASE_URL', $protocol . $host . $basePath . '/');

// Alternative manuelle si l'auto-détection ne fonctionne pas
// define('BASE_URL', 'http://localhost/butine_site/');

// Chemins du système de fichiers
define('ROOT_PATH', __DIR__ . '/');
define('CORE_PATH', ROOT_PATH . 'core/');
define('CONTROLLERS_PATH', ROOT_PATH . 'controllers/');
define('VIEWS_PATH', ROOT_PATH . 'views/');
define('INCLUDES_PATH', ROOT_PATH . 'includes/');
define('PUBLIC_PATH', ROOT_PATH . 'public/');

// URLs publiques
define('PUBLIC_URL', BASE_URL . 'public/');
define('CSS_URL', PUBLIC_URL . 'css/');
define('JS_URL', PUBLIC_URL . 'js/');
define('IMG_URL', PUBLIC_URL . 'img/');

// Démarrer la session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Fonction helper pour les URLs d'assets
function asset_url($path) {
    return PUBLIC_URL . ltrim($path, '/');
}

// Fonction helper pour les URLs d'images
function img_url($path) {
    return IMG_URL . ltrim($path, '/');
}

// Fonction helper pour les URLs CSS
function css_url($path) {
    return CSS_URL . ltrim($path, '/');
}

// Fonction helper pour les URLs JS
function js_url($path) {
    return JS_URL . ltrim($path, '/');
}

// Configuration de base de données (si nécessaire)
/*
define('DB_HOST', 'localhost');
define('DB_NAME', 'butine_db');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
*/
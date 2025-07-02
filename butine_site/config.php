<?php
// Configuration générale
define('DEBUG_MODE', true);
define('BASE_URL', 'http://Cybemirxw.grimkujow.repl.co/butine_site/'); // Ajustez selon votre environnement

// Chemins
define('ROOT_PATH', __DIR__ . '/');
define('CORE_PATH', ROOT_PATH . 'core/');
define('CONTROLLERS_PATH', ROOT_PATH . 'controllers/');
define('VIEWS_PATH', ROOT_PATH . 'views/');
define('INCLUDES_PATH', ROOT_PATH . 'includes/');
define('PUBLIC_PATH', ROOT_PATH . 'public/');

// Démarrer la session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Configuration de base de données (si nécessaire)
/*
define('DB_HOST', 'localhost');
define('DB_NAME', 'butine_db');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
*/
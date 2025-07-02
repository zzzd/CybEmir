<?php
// Gestion des erreurs
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Inclusion de la configuration
require_once 'config.php';

// Définir le mode maintenance
define('MAINTENANCE_MODE', false);

// Vérifier le mode maintenance
if (MAINTENANCE_MODE && !isset($_GET['test']) && !isset($_SESSION['ignore_close'])) {
    require('closed.php');
    exit;
} elseif (isset($_GET['test'])) {
    $_SESSION['ignore_close'] = true;
}

// Inclusion des classes principales
require_once CORE_PATH . 'View.php';
require_once CORE_PATH . 'Controller.php';
require_once CORE_PATH . 'Router.php';

// Inclusion des contrôleurs
require_once CONTROLLERS_PATH . 'PublicController.php';
//require_once CONTROLLERS_PATH . 'AdminController.php';

try {
    // Créer et exécuter le routeur
    $router = new Router();
    $router->route();

} catch (Exception $e) {
    // Gestion des erreurs
    if (DEBUG_MODE) {
        echo "Erreur : " . $e->getMessage();
        echo "<br>Fichier : " . $e->getFile();
        echo "<br>Ligne : " . $e->getLine();
    } else {
        // En production, afficher une page d'erreur générique
        http_response_code(500);
        $view = new View();
        $view->render('errors/500', false);
    }
}
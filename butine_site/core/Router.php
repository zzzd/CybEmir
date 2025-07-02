<?php

class Router {

    public function route() {
        $path = array();
        $page = 'home';

        if (!empty($_GET['path'])) {
            $path = explode('/', urldecode($_GET['path']));
            $page = array_shift($path);
        }

        switch ($page) {
            // Pages publiques
            case 'home':
                $controller = new PublicController();
                $controller->home();
                break;

            case 'strategie':
                $controller = new PublicController();
                $controller->strategie();
                break;

            case 'contact':
                $controller = new PublicController();
                $controller->contact();
                break;

            case 'formation':
                $controller = new PublicController();
                $controller->formation();
                break;

            case 'conseil':
                $controller = new PublicController();
                $controller->conseil();
                break;

            case 'automatisation':
                $controller = new PublicController();
                $controller->automatisation();
                break;

            case 'outils':
                $controller = new PublicController();
                $controller->outils();
                break;

            case 'qualite-donnees':
                $controller = new PublicController();
                $controller->qualiteDonnees();
                break;

            case 'bi-data-viz':
                $controller = new PublicController();
                $controller->biDataViz();
                break;

            case 'iads':
                $controller = new PublicController();
                $controller->iads();
                break;

            // Pages admin
            case 'login':
                $controller = new AdminController();
                $controller->login();
                break;

            case 'logout':
                $controller = new AdminController();
                $controller->logout();
                break;

            case 'dashboard':
                $controller = new AdminController();
                $controller->dashboard();
                break;

            case 'admin':
                $controller = new AdminController();
                $controller->admin();
                break;

            default:
                // Page 404
                http_response_code(404);
                $view = new View();
                $view->render('errors/404', false);
                break;
        }
    }
}
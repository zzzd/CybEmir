<?php

class View {

    public function render($view, $useLayout = true, $data = []) {
        // Extraire les données pour les rendre disponibles dans la vue
        extract($data);

        if ($useLayout) {
            // Capturer le contenu de la vue
            ob_start();
            include VIEWS_PATH . $view . '.php';
            $content = ob_get_clean();

            // Inclure le layout principal
            include ROOT_PATH . 'views/layouts/main.php';
        } else {
            // Afficher directement la vue
            include VIEWS_PATH . $view . '.php';
        }
    }

    public function renderPartial($partial, $data = []) {
        extract($data);
        include INCLUDES_PATH . $partial . '.php';
    }
}
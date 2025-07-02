<?php

class Controller {

    protected $view;

    public function __construct() {
        $this->view = new View();
    }

    protected function render($view, $data = [], $useLayout = true) {
        $this->view->render($view, $useLayout, $data);
    }
}
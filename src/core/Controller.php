<?php

namespace core;
use core\View;

class Controller {

    protected Session $session;

    public function __construct() {
        $this->session = new Session();
    }

    public function __index() {
        $view = new View('home/index');
        $view->render();
    }
}
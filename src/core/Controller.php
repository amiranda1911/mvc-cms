<?php

namespace core;
use core\View;

abstract class Controller {

    protected Session $session;
    protected Persistence $persistence;

    public function __construct() {
        $this->session = new Session();
        $this->persistence = new Persistence();
        $this->session->getCsrf();

        if($_SERVER['REQUEST_METHOD'] == 'POST')
            if(!isset($_REQUEST['csrf']) && !($_REQUEST['csrf'] == $this->session->getCsrf()))
                die('csrf attack detect');
        
    }

    public function __index() {
        $view = new View('home/index');
        $view->render();
    }
}
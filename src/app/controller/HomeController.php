<?php

namespace app\controller;

use core\Controller;
use core\View;

class HomeController extends Controller{

    public function index(){
        $view = new View('home/index');
        $view->render(); 
    }
}


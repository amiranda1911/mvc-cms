<?php

namespace app\controller;

use core\Controller;
use core\View;

class PostController extends Controller{

    public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $view = new View('post/new');
            $view->render();
        }elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
            
        }
         
    }
}


<?php

namespace app\controller;

use core\Controller;
use core\View;

class PostController extends Controller{

    public function index(){
        if(isset($this->session->user)){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $view = new View('post/new');
                $view->render();
            }elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
                $user = $this->persistence->find("User", $this->session->user);
                if($user){
                    $post = new Post(null. $_REQUEST['title'], $_REQUEST['content'], $user);
                    $this->persistence->save($user);
                }
                
            }
        }else{
            header("Location: /login"); 
            exit; 
        }
    }
}


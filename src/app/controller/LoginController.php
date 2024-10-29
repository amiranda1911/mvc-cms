<?php

namespace app\controller;

use core\Controller;
use core\View;
use app\model\User;

class LoginController extends Controller {
    public function index() {
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $view = new View('login/index');
            $view->render();
        }elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = $this->persistence->findBy('User', array('email' => $_REQUEST['email']));
            if($user){
                $user= $user[0];
                //$user = new User($user->getId, $user->name, $user->content, $user->password);
                if($user->checkPassword($_REQUEST['password'])){
                    header("Location:/user/view/".$user->getId());
                    exit();
                }else{
                    die("senha incorreta");
                }
            }else{
                die("usuario invalido");
            }


            $view = new View('login/index');
            $view->render();
        }
    }
}
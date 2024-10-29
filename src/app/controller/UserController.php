<?php

namespace app\controller;

use core\Controller;
use core\View;
use app\model\User;

class UserController extends Controller{
    public function index() {
        $usersObject = $this->persistence->findAll("app\model\User");
        $users = [];
        foreach ($usersObject as $user){
            $newUser = array();
            $newUser['id'] = $user->getId();
            $newUser['name'] = $user->getName();
            $newUser['email'] = $user->getEmail();
            array_push($users, $newUser);
        }
        $view = new View('user/index', ['users' => $users]);
        $view->render();
    }

    public function create() {

        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $view = new View('user/create', []);
            $view->render();
        }
        elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
            $user = new User(null, $_REQUEST['name'], $_REQUEST['email'], $_REQUEST['password']);
            $user->setPassword($_REQUEST['password']); //Realizar a encriptação da senha
            $this->persistence->save($user);
            $view = new View('user/view', 
                ['id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
            
            ]);
            $view->render();
        }
    }

    public function view(...$params) {
        if(isset($params[0]) && (intval($params[0]) > 0)){
            $user = $this->persistence->find('app\model\User', $params[0]);
            $view = new View('user/view',
                ['id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
            ]);
            $view->render();
        }
    }
}
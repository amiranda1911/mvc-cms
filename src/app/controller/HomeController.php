<?php

namespace app\controller;

use core\Controller;
use core\View;

class HomeController extends Controller{

    public function index(){
        $postsObject = $this->persistence->findAll('app\model\Post');
        $posts = [];
        foreach ($postsObject as $post){
            $newUser = array();
            $newUser['id'] = $post->getId();
            $newUser['title'] = $post->getTitle();
            $newUser['content'] = $post->getContent();
            array_push($users, $newUser);
        }
        $view = new View('home/index', ['posts' => $posts]);
        $view->render(); 
    }
}


<?php

namespace app\controller;

use core\Controller;
use core\View;

class HomeController extends Controller{

    public function index(){
        $postsObject = $this->persistence->findAll('app\model\Post');
        $posts = [];
        foreach ($postsObject as $post){
            $newPost = array();
            $newPost['id'] = $post->getId();
            $newPost['title'] = $post->getTitle();
            $newPost['content'] = $post->getContent();
            array_push($posts, $newPost);
        }
        $view = new View('home/index', ['posts' => $posts]);
        $view->render(); 
    }
}


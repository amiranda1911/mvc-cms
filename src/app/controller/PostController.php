<?php

namespace app\controller;

use core\Controller;
use core\View;
use app\model\Post;

class PostController extends Controller{

    public function index(){
        if($this->session->user){
            if($_SERVER['REQUEST_METHOD'] == 'GET'){
                $view = new View('post/new');
                $view->render();
            }elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
                $user = $this->persistence->find("app\model\User", $this->session->user);
                if($user){
                    $post = new Post(null. $_REQUEST['title'], $_REQUEST['content'], $user);
                    $this->persistence->save($post);
                    header("Location: /");        
                }
                
            }
        }else{
            header("Location: /login"); 
            exit; 
        }
    }

    public function view(...$params) {
        if(isset($params[0]) && (intval($params[0]) > 0)){
            $postObject = $this->persistence->find('app\model\Post', $params[0]);
            $userObject = $this->persistence->find('app\model\User', $postObject->getUser()->getId());
            
            $post = [
                'title' => $postObject->getTitle(),
                'content' => $postObject->getContent()
            ];

            $user = [
                'id' => $userObject->getId(),
                'name' => $userObject->getName()
            ];
            
            $view = new View('post/view',
                ['post' => $post, 'user' => $user]
            );
            $view->render();
        }
    }
}


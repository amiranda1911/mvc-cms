<?php

namespace core;

class Session{

    public function __construct(){
        session_start();
    }

    public function __set($k, $v){  
        $_SESSION[$k] = $v;
    }

    public function __get($k){
        return isset($_SESSION[$k]) ? $_SESSION[$k] : null;
    } 
    
    public function getCsrf(): string{
        if(!isset($this->csrf)){
            $this->csrf = sha1(uniqid(mt_rand(), true)); 
        }
        return $this->csrf;
    }
}
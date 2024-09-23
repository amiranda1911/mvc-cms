<?php

namespace core;

class Session{

    public function __construct(){
        session_start();
    }

    public function __set($k, $v){  
        $this->$_SESSION[$k] = $v;
    }

    public function __get($k){
        return isset($_SESSION[$k]) ? $_SESSION[$k] : null;
    }
    
    public function getCsfr(): string{
        if(!isset($this->csfr)){
            $this->csfr = sha1(APP_SEED + uniqid(mt_rand(), true)); 
        }
        return $this->csfr;
    }
}
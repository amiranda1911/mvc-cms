<?php

namespace core;

class Cookies {

    private $duration = 3600;
    private $path = '/';
    private $args = array();

    public function __construct() {
    
    }

    public function __set($k, $v) {
        setcookie($k, $v, time() + $this->duration, $this->path);
    }

    public function __get($k) {
        return isset($_COOKIE[$k]) ? $_COOKIE[$k] : null;
    }
}
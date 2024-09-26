<?php

namespace core;

class View {
    private $view = null;
    private $data = null;

    public function __construct($view, $data = array()) {
        $this->view = $view;
        $this->data = $data;
        $view_path = VIEWS_DIR.DS.$this->view.'.php';
        //verifica se existe a view e exibe se encontrada 
        if(file_exists($view_path))
            $this->view = $view;
        
        else {
            http_response_code(500);
            die("500 view {$this->view}");
        } 
    }

    public function render() {
        $data = $this->data;
        require_once(VIEWS_DIR.DS.$this->view.'.php');
    }
}
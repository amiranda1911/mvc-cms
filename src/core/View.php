<?php

namespace core;

class View {

    private $template;
    private $view = null;
    private $data = array();

    public function __construct($view, $data = array()) {
        $this->template = new \League\Plates\Engine(VIEWS_DIR);
        $this->view = $view;
        $this->data = $data;
    }

    public function render() {
        echo $this->template->render($this->view, [...$_SESSION,...$this->data]);
    }

    public function addData($key, $value) {
        $this->template->addData([$key => $value]);
    }
}
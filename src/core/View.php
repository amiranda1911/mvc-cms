<?php

namespace core;

class View {

    private $template;
    private $view = null;
    private $data = null;

    public function __construct($view, $data = array()) {
        $this->template = new \League\Plates\Engine(VIEWS_DIR);
        $this->view = $view;
        $this->data = $data;
    }

    public function render() {
        echo $this->template->render($this->view, array_merge($_SESSION,$this->data));
    }
}
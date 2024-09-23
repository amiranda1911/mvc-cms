<?php 

namespace core;

class Router {

    private $controller = "Home";
    private $method = "index";
    private $action = null;

    public function __construct () {
        $router = $this->url();

        //Verifica se a classe existe ou atribui a classe da Homepage
        $controller_path = ROOT.DS.'src'.DS.'app'.DS.'controller'.DS.ucfirst($router[0]).'Controller.php';
        
        if(file_exists($controller_path)){
            $this->controller = $router[0];
            unset($router[0]);
        }
                
        //carrega o controller de forma dinâmica
        $class = 'app\\controller\\'.ucfirst($this->controller).'Controller';
        $object = new $class;
        
        //verifica a existência do método ou atribui o método "index"
        if(isset($router[1]) and method_exists($object, $router[1])){
            $this->method = $router[1];
            unset($router[1]);
        }
        
        $this->action = $router ? array_values($router) : [];

        // chama o metodo do controlador com os parametros da ação
        call_user_func_array([$object, $this->method], $this->action);
    }


    private function url (): array|bool  {
        /**
         * Modelo de array de resposta
         * array(2) {
         *   [0] => "controller"
         *   [1] => "method"
         *   [2] => "action
         *   }
         */

        //remove a barra inicial para evitar a criação de um elemento vazio
        $uri = ltrim($_SERVER["REQUEST_URI"], '/');
        $parse_url = explode("/", $uri);
        return $parse_url;
    }
}
<?php

// Exibir todos os erros
error_reporting(E_ALL);

// Ativar exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);

require ROOT.DS.'vendor'.DS.'autoload.php';

use core\Router;

new Router();
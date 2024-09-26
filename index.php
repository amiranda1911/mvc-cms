<?php

// Exibir todos os erros
error_reporting(E_ALL);

// Ativar exibição de erros
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

define('ROOT', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
define('VIEWS_DIR', ROOT.DS.'src'.DS.'app'.DS.'view');

define('APP_SEED', getenv('APP_SEED'));

define('MYSQL_HOST', getenv('MYSQL_HOST'));
define('MYSQL_USER', getenv('MYSQL_USER'));
define('MYSQL_PASSWORD', getenv('MYSQL_PASSWORD'));
define('APP_DATABASE', getenv('APP_DATABASE')); 


require ROOT.DS.'vendor'.DS.'autoload.php';

use core\Router;

new Router();
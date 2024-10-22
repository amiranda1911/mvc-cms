<?php
if(defined("ROOT"))
    define('VIEWS_DIR', ROOT.DS.'src'.DS.'app'.DS.'view');

define('MYSQL_HOST', getenv('MYSQL_HOST'));
define('MYSQL_USER', getenv('MYSQL_USER'));
define('MYSQL_PASSWORD', getenv('MYSQL_PASSWORD'));
define('APP_DATABASE', getenv('APP_DATABASE')); 
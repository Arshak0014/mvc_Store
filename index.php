<?php

require 'application/lib/Dev.php';

use application\core\Router;

spl_autoload_register(function ($class) {
    $path = str_replace('\\','/',$class.'.php');
    if(file_exists($path)){
        require $path;
    }
});

session_start();

define('ROOT', dirname(__FILE__));

$router = new Router();

$router->run();

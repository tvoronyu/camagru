<?php

use Components\Router;

try {
    require_once __DIR__ . "/vendor/autoload.php";
}
catch (\Exception $exception){
    exit(0);
}
//FRONT CONTROLLER

//1. Общие настройки

ini_set('display_errors');
error_reporting(E_ALL);

//2. Подключение файловой системы

define('ROOT', dirname(__FILE__));
//require_once (ROOT.'/components/Router.php');

//session_start();
//3. Установка соединения с БД

//4. Вызов Router

try {
    $router = new Router();
    $router->run();
}
catch (\Error $error){
    print_r($error);
}

exit(0);

//include_once ROOT."/views/main/index.php";
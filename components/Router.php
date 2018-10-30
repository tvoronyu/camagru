<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/27/18
 * Time: 4:09 PM
 */

class Router
{

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include ($routesPath);

//        if (!$_COOKIE['camagru'])
//            setcookie('camagru', 'taras');

//        var_dump($cookie);
    }


    /**
     * Returns request string
     */

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        //Получить строку запроса
        $uri = $this->getURI();
        if ($uri == ''){
            include_once ROOT."/views/main/index.php";
        }
        else {

            //Проверить наличие такого запроса в routes.php

            foreach ($this->routes as $uriPattern => $path) {

                if (preg_match("~$uriPattern~", $uri)) {
                    //Если есть совпадение, определить какой контроллер
                    //и action обрабатывает запрос
                    $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                    //определить контролер и action

                    $segment = explode('/', $internalRoute);

                    $controllerName = array_shift($segment) . "Controller";
                    $controllerName = ucfirst($controllerName);

                    $actionName = "action" . ucfirst(array_shift($segment));

////
//                echo $controllerName."<br>";
//                echo $actionName;

                    //Подключить файл класса-контроллера
                    $parameters = $segment;
//
//                echo "<pre>";
//                print_r($segment);

                    $controllerFile = ROOT . '/controllers/' . $controllerName . ".php";
//                echo $controllerFile;


                    if (file_exists($controllerFile)) {
//                     echo "test";
                        include_once $controllerFile;
                    }

//                 print_r($segment);

                    $controllerObject = new $controllerName;
//                    echo "1234";
                    $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
//                    echo "12";
                    if ($result != null) {
//                     echo "<pre>";
//                     print_r($result);
//                     echo "test";
                        break;
                    }
                }

            }
//            var_dump($result);
//            if (!$result){
//                header("location: /");
//            }
        }


        //Создать объектб вызвать метод (т.е. action)

    }
}
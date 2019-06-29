<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/27/18
 * Time: 4:09 PM
 */
namespace Components;

use App\Controllers\Misc\Misc as app;

class Router
{

    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include ($routesPath);
    }


    /**
     * Returns request string
     */

    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])){
            return trim(explode("?",trim($_SERVER['REQUEST_URI'], '/'))[0],'/');
        }
    }

    public function run(){
//        Получить строку запроса
        $uri = $this->getURI();

        $routers = include __DIR__."/../config/routes.php";

        if (in_array($uri, array_keys($routers))){

            $getRequestMethod = explode('|', $routers[$uri]);

            if ($getRequestMethod[0] != $_SERVER['REQUEST_METHOD'])
                app::trace("Method Error");

            $routers[$uri] = $getRequestMethod[1];

            $parseCallClass = explode("@",$routers[$uri]);

            $path = explode('/', $parseCallClass[0]);

            $className = array_pop($path);

            $pathClass = $path[0];

            $methodName = $parseCallClass[1];

            $controllerFile = ROOT . "/app/Controllers/".$pathClass."/".$className.".php";

            if (file_exists($controllerFile)) {
                include_once $controllerFile;
            }
            else{
                app::trace("404");
            }

            $fullNameSpace = "App\Controllers\\$pathClass\\$className";

            $obj = $this->getClassObject($fullNameSpace);

            $obj->$methodName();

        }
        else {
            app::trace("404");
            header("Location:signup");
        }
    }

    private function getClassObject($fullNameSpace){
        $class = [
            'App\Controllers\Auth\Signup' => \App\Controllers\Auth\Signup::class,
        ];

        return new $class[$fullNameSpace];
    }
}
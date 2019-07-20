<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/27/18
 * Time: 4:09 PM
 */
namespace Components;

use App\Controllers\Misc\Misc as app;
use App\Controllers\Misc\Request;

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
        session_start();
//        Получить строку запроса
//        app::trace($_SESSION);
//        unset($_SESSION['account']);
//        if (!isset($_SESSION['account']) && isset($_SESSION['logout']) && $_SESSION['logout'] == 1)
//            return include_once ROOT . "/views/main/index.php";
//        app::trace($_SESSION);

//        if (!isset($_SESSION['account'])) {
//            $_SESSION['logout'] = 1;
//
//            \header("Location:/");
//        }

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

            $pathClass = implode("/",$path);
//app::trace($parseCallClass);
            $methodName = $parseCallClass[1];

            $controllerFile = ROOT . "/app/".$pathClass."/".$className.".php";
//Misc::trace($controllerFile);
            if (file_exists($controllerFile)) {
                include_once $controllerFile;
            }
            else{
                app::trace("404");
            }

            $pathClass = implode("\\",$path);
            $fullNameSpace = "App\\$pathClass\\$className";

            $obj = $this->getClassObject($fullNameSpace);


            $request = new Request();

            $result = $obj->$methodName($request);

            $this->printResult($result);

        }
        else {
            app::trace("404");
            header("Location:signup");
        }
    }

    private function getClassObject($fullNameSpace){
        $class = [

            /**
             * Controllers
             */
            /** ************************************************************************ */

            'App\Controllers\Auth\Signup' => \App\Controllers\Auth\Signup::class,
            'App\Controllers\Auth\Login' => \App\Controllers\Auth\Login::class,
            'App\Controllers\Auth\Logout' => \App\Controllers\Auth\Logout::class,
            'App\Controllers\Auth\VerifyEmail' => \App\Controllers\Auth\VerifyEmail::class,
            'App\Controllers\Auth\ForgotPassword' => \App\Controllers\Auth\ForgotPassword::class,
            'App\Controllers\User\User' => \App\Controllers\User\User::class,
            'App\Controllers\Camera\Camera' => \App\Controllers\Camera\Camera::class,
            'App\Controllers\Gallery\Like' => \App\Controllers\Gallery\Like::class,
            'App\Controllers\Gallery\Comment' => \App\Controllers\Gallery\Comment::class,

            'App\Controllers\Test\Test' => \App\Controllers\Test\Test::class,

            /** ************************************************************************ */


            /**
             * Views
             */
            /** ************************************************************************ */

            'App\Views\Signup' => \App\Views\Signup::class,
            'App\Views\Login' => \App\Views\Login::class,
            'App\Views\Landing' => \App\Views\Landing::class,
            'App\Views\Camera' => \App\Views\Camera::class,
            'App\Views\Profile' => \App\Views\Profile::class,
            'App\Views\Gallery' => \App\Views\Gallery::class,

            /** ************************************************************************ */
        ];

        return new $class[$fullNameSpace];
    }

    private function printResult($result){
        if (is_array($result)) {
            print \json_encode($result);
        }
        else
            print $result;
    }

}
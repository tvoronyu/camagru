<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-07-06
 * Time: 12:52
 */

namespace App\Views;


use App\Controllers\Misc\Misc;
use App\Controllers\ViewController;

class Login extends ViewController
{

    public function getLogin(){

        if ($this->auth())
            header("location:/camera");

        include ROOT . "/views/login/index.php";
    }
}
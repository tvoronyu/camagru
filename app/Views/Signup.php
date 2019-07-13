<?php
/**
 * Created by PhpStorm.
 * User: Taras
 * Date: 30.06.2019
 * Time: 16:28
 */

namespace App\Views;

use App\Controllers\ViewController;

class Signup extends ViewController
{
    public function getSignup(){

        if ($this->auth())
            header("location:/camera");

         include ROOT . "/views/signup/index.php";
    }
}
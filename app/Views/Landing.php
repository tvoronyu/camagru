<?php
/**
 * Created by PhpStorm.
 * User: Taras
 * Date: 30.06.2019
 * Time: 16:49
 */

namespace App\Views;

use App\Controllers\ViewController;

class Landing extends ViewController
{
    public function getLanding(){

        if ($this->auth())
            header("location:/camera");

        include ROOT . "/views/main/index.php";
    }
}
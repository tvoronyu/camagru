<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-07-06
 * Time: 14:41
 */

namespace App\Views;

use App\Controllers\Misc\Request;
use App\Controllers\ViewController;

class Camera extends ViewController
{

    public function getCamera(Request $request)
    {

        if (!$this->auth())
            header("location:/login");

        include ROOT . "/views/camera/index.php";
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-07-12
 * Time: 15:01
 */

namespace App\Views;

use App\Controllers\Misc\Request;
use App\Controllers\ViewController;

class Gallery extends ViewController
{
    public function getGallery(Request $request)
    {

        if (!$this->auth())
            header("location:/login");

        include ROOT . "/views/gallery/index.php";
    }
}
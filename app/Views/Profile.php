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

class Profile extends ViewController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getProfile(Request $request)
    {

        if (!$this->auth())
            header("location:/login");

        include ROOT . "/views/cabinet/index.php";
    }
}
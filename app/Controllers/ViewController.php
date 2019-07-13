<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-07-06
 * Time: 13:06
 */

namespace App\Controllers;


use App\Controllers\Auth\Auth;
use App\Controllers\Misc\Request;

class ViewController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        header("Content-Type:text/html");
    }
}
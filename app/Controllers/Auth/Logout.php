<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-07-06
 * Time: 14:59
 */

namespace App\Controllers\Auth;


use App\Controllers\Controller;
use App\Controllers\Misc\Request;

class Logout extends Controller
{
    public function logout(Request $request){

        if (!$this->auth())
            header('location:/login');

        unset($_SESSION['account']);

        header('location:/login');
    }
}
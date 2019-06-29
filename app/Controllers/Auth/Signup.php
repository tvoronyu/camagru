<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-06-29
 * Time: 13:54
 */

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Controllers\Misc\Misc;
use App\Model\Orm\User\User;

class Signup extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function signup(){

        /**
         * тут треба написати валідацію
         */

       $email = $this->request['email'];
       $password = $this->request['password'];
       $name = $this->request['name'];

       User::create("fdf");

    }
}

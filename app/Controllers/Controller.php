<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-06-29
 * Time: 12:38
 */

namespace App\Controllers;

use App\Controllers\Misc\Misc;
use App\Controllers\Misc\Clear;
use App\Controllers\Misc\Validate;
use App\FrontController;
use App\Model\Orm\User\User;

class Controller extends FrontController
{
    public $validator;

    public function __construct()
    {
        header("Content-Type:application/json");
        $this->validator = new Validate();

    }

    public function auth(){
        if (!isset($_SESSION['account']))
            return false;

        if (empty(User::get(['user_id'=>$_SESSION['account']['user_id']]))){
            unset($_SESSION['account']);
            return false;
        }


        return true;
    }

    protected function middleResponse($dst = array(), $src = null){

        $addArr = [
            "status"=>1,
            "msg"=>"success"
        ];

        if (!is_null($src)){
            $dst = array_merge($dst, $src);
        }

        if (isset($dst['status']))
            return $dst;

        return array_merge($addArr, $dst);
    }

    protected function sendEmail($to, $subject, $message){
        $headers = 'From: camagru@website.ua' . "\r\n" .
            'Reply-To: camagru@website.ua' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        mail($to, $subject, $message, $headers);
    }
}
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
use App\Model\Logic\DB;
use App\Model\Orm\Pass\Password;
use App\Model\Orm\PreReg\PreReg;
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

       $whereUser = [
           'user_email' => $email
       ];

       $user = User::get($whereUser);

       if (!empty($user)){
           header("Content-Type:application/json");
           print json_encode([
               "status" => 0,
               "msg" => "Email exist"
           ]);
           return ;
       }

       $passInsert = [
           'pass_user_id' => 0,
           'pass_password' => hash('sha512', $password)
       ];

       $passId = Password::create($passInsert);

       $uniqueCode = uniqid(\time());

       $pregInsert = [
           'pre_email' => $email,
           'pre_name' => $name,
           'pre_pass_id' => $passId,
           'pre_unique_code' => $uniqueCode,
           'pre_expire' => time() + 300,
           'pre_reg' => 1,
           'pre_active' => 0
       ];

       $preId = PreReg::create($pregInsert);

       $link = "http://".$_SERVER['SERVER_NAME']."/activate"."?ps=$uniqueCode";


       $html = "For active you account, please go this link $link";


       $this->sendEmail("taras_voronyuk@ukr.net", "Register You Account", $html);

        header("Content-Type:application/json");
        print json_encode([
            "status" => 1,
            "msg" => "success"
        ]);
        return ;

       Misc::trace2(1,$this->request, $uniqueCode, $link);

    }

    private function sendEmail($to, $subject, $msg){
        mail($to,$subject, $msg);
    }
}

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
use App\Controllers\Misc\Request;
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

    public function signup(Request $request){

        /**
         * тут треба написати валідацію
         */

       $email = $request->get('email');
       $password = $request->get('password');
       $name = $request->get('name');
       $sername = $request->get('sername');

       $whereUser = [
           'user_email' => $email
       ];
       if (!empty($user = User::get($whereUser)))
           return ['status'=>0, 'msg'=>"Email exist"];

       $passInsert = [
           'pass_user_id' => 0,
           'pass_password' => hash('sha512', $password)
       ];

       $passId = Password::create($passInsert);

       $uniqueCode = uniqid(\time());

       $pregInsert = [
           'pre_email' => $email,
           'pre_name' => $name,
           'pre_sername' => $sername,
           'pre_pass_id' => $passId,
           'pre_unique_code' => $uniqueCode,
           'pre_expire' => time() + 300,
           'pre_reg' => 1,
           'pre_active' => 0
       ];

       $preId = PreReg::create($pregInsert);

       $link = "http://".$_SERVER['SERVER_NAME']."/activate"."?ps=$uniqueCode";


       $html = "For active you account, please go this link $link";


       $this->sendEmail($email, "Register You Account", $html);

       return $this->middleResponse();

       Misc::trace2(1,$this->request, $uniqueCode, $link);

    }
}

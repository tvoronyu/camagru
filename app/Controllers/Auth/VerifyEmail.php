<?php
/**
 * Created by PhpStorm.
 * User: Taras
 * Date: 30.06.2019
 * Time: 22:17
 */

namespace App\Controllers\Auth;


use App\Controllers\Controller;
use App\Controllers\Misc\Misc;
use App\Model\Logic\DB;
use App\Model\Orm\PreReg\PreReg;

class VerifyEmail extends Controller
{
    public function verify(){

        $code = $this->request['ps'];

        if (empty($code)){
            header("Content-Type:application/json");
            print json_encode([
                "status" => 0,
                "msg" => "Not found code"
            ]);
            return ;
        }

        $wherePre = [
            'pre_unique_code' => $code,
            'pre_reg' => 1,
            'pre_active' => 0
        ];

//        Misc::trace((new DB())->table("pre_registration")->where($wherePre)->get());

        $preReg = PreReg::get($wherePre);

        if (empty($preReg)){
            header("Content-Type:application/json");
            print json_encode([
                "status" => 0,
                "msg" => "Not found code"
            ]);
            return ;
        }

        $updatePre = [
            'pre_active' => 1
        ];




        Misc::trace($preReg);
    }
}
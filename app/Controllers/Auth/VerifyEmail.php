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
use App\Controllers\Misc\Request;
use App\Model\Logic\DB;
use App\Model\Orm\PreReg\PreReg;
use App\Model\Orm\User\User;

class VerifyEmail extends Controller
{
    public function verify(Request $request){

        if (empty($code = $request->get('ps')))
            return ['status'=>0,'msg'=>"Not found code"];

        $wherePre = [
            'pre_unique_code' => $code,
            'pre_reg' => 1,
            'pre_active' => 0
        ];

        if (empty($preReg = PreReg::get($wherePre)))
            return ['status'=>0,'msg'=>"Not found code"];

        if (isset($preReg[0]))
            $preReg = (array)$preReg[0];
        else
            return ['status'=>0,'msg'=>"Not found code"];

        if (time() > $preReg['pre_expire'])
            return ['status'=>0,'msg'=>"Code is expired"];

        $updatePre = [
            'pre_active' => 1,
            'pre_reg' => 0
        ];

        $res = PreReg::update($updatePre, $wherePre);


        $userId = $this->createUser($preReg);

        header('location:/login');

        return $this->middleResponse(['user_id'=>$userId]);



        Misc::trace($userId);
        Misc::trace2(0, $preReg, $res->queryString);
    }


    private function createUser($preReg){

        $createUser = [
            'user_name' => $preReg['pre_name'],
            'user_sername' => $preReg['pre_sername'],
            'user_pass_id' => $preReg['pre_pass_id'],
            'user_email' => $preReg['pre_email']
        ];

        $userId = User::create($createUser);

        return $userId;

    }
}
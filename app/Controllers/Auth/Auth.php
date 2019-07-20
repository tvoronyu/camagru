<?php


namespace App\Controllers\Auth;


use App\Controllers\Controller;
use App\Controllers\Misc\Request;
use App\Model\Logic\DB;
use App\Model\Orm\User\User;

class Auth extends Controller
{
    public function auth2(Request $request){

        if (isset($_SESSION['account'])) {
            $whereUser = [
                'user_id' => $_SESSION['account']['user_id']
            ];

            if (empty($user = User::getFullUser($whereUser)))
                return ['status' => 0, 'msg' => 'User is not exist'];

            if (isset($user[0]))
                $user = (array)$user[0];

            $_SESSION['account'] = $user;

        }
        else{
            return ['status' => 0, 'msg' => 'User is not exist'];
        }

        return ['status' => 1];

    }
}
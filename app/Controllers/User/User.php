<?php


namespace App\Controllers\User;


use App\Controllers\Controller;
use App\Controllers\Misc\Misc;
use App\Controllers\Misc\Request;
use App\Model\Logic\DB;
use App\Model\Orm\Comment\Comment;
use App\Model\Orm\Pass\Password;

class User extends Controller
{
    public function changeName(Request $request){


        $update = [
            'user_name' => $request->get('name')
        ];

        $where = [
            'user_id' => $_SESSION['account']['user_id']
        ];

        (new DB())->table('users')->where($where)->update($update);

        $user = \App\Model\Orm\User\User::get(['user_id' => $_SESSION['account']['user_id'], 'user_del' => 0]);

        if (empty($user))
            return ['status' => 0, 'msg' => 'User is not exist'];

        $user = (array)$user[0];

        $whereComment = [
            'cm_user_id' => $_SESSION['account']['user_id']
        ];

        $updateComment = [
            'cm_user_name' =>$user['user_name']
        ];

        Comment::updateComment($updateComment, $whereComment);

        return $this->middleResponse(['status' => 0, 'msg'=>'fail']);

    }


    public function changeSerName(Request $request){


        $update = [
            'user_sername' => $request->get('sername')
        ];

        $where = [
            'user_id' => $_SESSION['account']['user_id']
        ];

        if ((new DB())->table('users')->where($where)->update($update))
            return $this->middleResponse($request->all());

        return $this->middleResponse(['status' => 0, 'msg'=>'fail']);

    }

    public function changeEmail(Request $request){


        $update = [
            'user_email' => $request->get('email')
        ];

        $where = [
            'user_id' => $_SESSION['account']['user_id']
        ];

        if ((new DB())->table('users')->where($where)->update($update))
            return $this->middleResponse($request->all());

        return $this->middleResponse(['status' => 0, 'msg'=>'fail']);

    }

    public function changeNotification(Request $request){

        $notification = $request->get('notification');

        if ($notification)
            $update = [
                'user_notification' => 1
            ];
        if (!$notification)
            $update = [
                'user_notification' => 0
            ];

        $where = [
            'user_id' => $_SESSION['account']['user_id']
        ];

        if ((new DB())->table('users')->where($where)->update($update))
            return $this->middleResponse($request->all());

        return $this->middleResponse(['status' => 0, 'msg'=>'fail']);

    }

    public function changePassword(Request $request){

        $old = $request->get('password')['old'];
        $new = $request->get('password')['new'];

        if (hash('sha512',$old) !== $_SESSION['account']['pass_password'])
            return $this->middleResponse(['status'=>0,'msg'=>"Incorrect password"]);

        $pass = hash('sha512',$new);

        $update = [
            'pass_password' => $pass
        ];

        $where = [
            'users.user_id' => $_SESSION['account']['user_id'],
            'pass_id' => $_SESSION['account']['pass_id']
        ];

        if (Password::updatePassword($where, $update))
            return $this->middleResponse();

        return $this->middleResponse(['status' => 0, 'msg'=>'fail']);

    }
}
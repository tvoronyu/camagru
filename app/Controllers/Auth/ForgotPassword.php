<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-07-06
 * Time: 15:27
 */

namespace App\Controllers\Auth;

use App\Controllers\Controller;
use App\Controllers\Misc\Request;
use App\Model\Orm\Pass\ResetPassword;
use App\Model\Orm\User\User;

class ForgotPassword extends Controller
{
    public function forgotPassword(Request $request)
    {

        $email = $request->get('email');

        /**
         * Валідуємо емейл
         */

        if (empty($email))
            return ['status' => 0, 'msg' => 'Email not found'];

        if (empty($user = User::get(['user_email' => $email])))
            return ['status' => 0, 'msg' => "User exist"];

        if (isset($user[0]))
            $user = (array)$user[0];

        $uniqueCode = uniqid(\time());


        $createResPass = [
            'res_user_id' => $user['user_id'],
            'res_code' => $uniqueCode
        ];

        ResetPassword::create($createResPass);

        $link = "http://" . $_SERVER['SERVER_NAME'] . "/reset" . "?ps=$uniqueCode";

        $html = "For reset your password, please go this link $link";


        $this->sendEmail($email, "Reset Password of your Account", $html);

        return $this->middleResponse();

        /**
         * Відправляємо на почту код підтвердження
         */

        /**
         * Респонс про те що якщо такий емейл є в нашій базі то ти отримаєш лист и перейди за посиланням
         */

        return $this->middleResponse(['msg' => "якщо такий емейл є в нашій базі то ти отримаєш лист и перейди за посиланням"]);

    }

    public function forgotVerify(Request $request)
    {

    }
}
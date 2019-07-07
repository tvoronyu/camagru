<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-07-06
 * Time: 13:11
 */

namespace App\Controllers\Auth;


use App\Controllers\Controller;
use App\Controllers\Misc\Misc;
use App\Controllers\Misc\Request;
use App\Model\Orm\User\User;

class Login extends Controller
{

    public function login(Request $request){

        $email = $request->get('email');

        $password = $request->get('password');

        /**
         * Валідація вхідних данних ( Email and Password )
         */

        /**
         * Перевірка чи існує коритувач
         */

        $whereUser = [
            'users.user_email' => $email,
            'passwords.pass_password' => hash('sha512', $password)
        ];

        if (empty($user = User::getUserByEmailAndPassword($whereUser)))
            return ['status' => 0, 'msg' => 'User exist'];

        if (isset($user[0]))
            $user = (array)$user[0];

        $_SESSION['account'] = $user;

//        Misc::trace($_SESSION['account']);

        /**
         * Записуємо в сесію юзера і редіректимо на головну сторінку
         */

        return $this->middleResponse(['result' => "Ok!"]);

        header('Location:/signup');

    }
}
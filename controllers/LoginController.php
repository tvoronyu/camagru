<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/28/18
 * Time: 1:00 PM
 */

class LoginController
{
    public function actionLogin()
    {
        include_once ROOT.'/views/login/index.php';
        return true;
    }

    public function actionLogout()
    {
        $_SESSION['login'] = '';
        $_SESSION['id'] = '';
        header('Location:/login');
        return true;
    }

    public function actionLoginvalid(){
        include_once ROOT.'/models/Users.php';

        $result = Users::getUsersLogin();

        while ($row = $result->fetch()){
//            echo print_r($row);
//            echo print_r($_POST);
            if ($row['login_user'] == $_POST['email']){
                if ($row['password_user'] == $_POST['password']){
                    echo 'yes';
                    $_SESSION['login'] = $row['login_user'];
                    $_SESSION['id'] = $row['id_user'];
//                    var_dump($row);
                    return true;
                }
            }
        }
        echo 'no';
        return true;
    }
}
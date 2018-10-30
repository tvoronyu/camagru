<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/29/18
 * Time: 6:15 PM
 */
include_once ROOT.'/models/Users.php';

class UserCabinetController
{

    public function actionGetCabinet()
    {
        if ($_SESSION['login'] == ''){
            header('Location: /login');
        }
        $result = Users::getUserId($_SESSION['id']);
//
        $var = $result->fetch();
//        $id = $var['id_user'];
        if ($var) {
//            if (1){
//                include_once ROOT.'/controllers/UsersController.php';
//                UsersController::actionUserId($id);
//            }
//            else {
                include_once ROOT.'/views/cabinet/index.php';
//            }
        }
        else{
            echo "fd";
            header('Location: /users');
        }
        return true;
    }
}
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
}
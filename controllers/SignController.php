<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/28/18
 * Time: 1:35 PM
 */

class SignController
{
    public function actionSignup()
    {
        include_once ROOT.'/views/signup/index.php';
        return true;
    }
}
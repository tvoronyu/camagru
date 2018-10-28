<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/27/18
 * Time: 8:38 PM
 */

class Users
{
    public static function getUsersList(){

        $dbPath = ROOT."/template/dbConnect.php";
        include_once $dbPath;

        $dbConnect = new dbConnect();

        $db = $dbConnect->dbCon();

        $result = $db->query('SELECT `id_user` , `login_user`, `pic_user` FROM `users` WHERE 1');

        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getUsersLogin(){

        $dbPath = ROOT."/template/dbConnect.php";
        include_once $dbPath;

        $dbConnect = new dbConnect();

        $db = $dbConnect->dbCon();

        $result = $db->query('SELECT `login_user` , `password_user` FROM `users`');

        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getUserId($user_id){
        $dbPath = ROOT."/template/dbConnect.php";
        include_once $dbPath;

        $dbConnect = new dbConnect();

        $db = $dbConnect->dbCon();

        $result = $db->query('SELECT `id_user`, `login_user`, `pic_user` FROM `users` WHERE `id_user` IN ('.$user_id.')');

        if ($result) {
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result;
        }
        else{
            echo "error";
            return false;
        }
    }

    public static function delUserId($user_id){
        $dbPath = ROOT."/template/dbConnect.php";
        include_once $dbPath;

        $dbConnect = new dbConnect();

        $db = $dbConnect->dbCon();

        $db->query('DELETE FROM `users` WHERE `id_user` IN ('.$user_id.')');
    }
}
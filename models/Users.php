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

        $result = $db->query('SELECT `id_user` , `name_user`,`sename_user`, `pic_user` FROM `users` WHERE 1');

        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getUsersLogin(){

        $dbPath = ROOT."/template/dbConnect.php";
        include_once $dbPath;

        $dbConnect = new dbConnect();

        $db = $dbConnect->dbCon();

        $result = $db->query('SELECT `login_user` ,`id_user`, `password_user` FROM `users`');

        $result->setFetchMode(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function getUserId($user_id){
        $dbPath = ROOT."/template/dbConnect.php";
        include_once $dbPath;

        $dbConnect = new dbConnect();

        $db = $dbConnect->dbCon();

        $result = $db->query('SELECT `id_user`, `login_user`,`name_user`, `sename_user`, `pic_user` FROM `users` WHERE `id_user` IN ('.$user_id.')');

        if ($result) {
            $result->setFetchMode(PDO::FETCH_ASSOC);
            return $result;
        }
        else{
            echo "error";
            return false;
        }
    }

    public static function setUser(){
        $dbPath = ROOT."/template/dbConnect.php";
        include_once $dbPath;

        $dbConnect = new dbConnect();

        $db = $dbConnect->dbCon();

        $name = $_POST['name'];
        $login = $_POST['email'];
        $sername = $_POST['sername'];
        $password = $_POST['password'];

//        $result = $db->query("INSERT INTO users(login_user) VALUE ('$name')");

        $result = $db->query("INSERT INTO users( password_user, login_user, name_user, sename_user) VALUES ('$password','$login','$name','$sername')");
//        echo var_dump($name);
    }

    public static function delUserId($user_id){
        $dbPath = ROOT."/template/dbConnect.php";
        include_once $dbPath;

        $dbConnect = new dbConnect();

        $db = $dbConnect->dbCon();

        $db->query('DELETE FROM `users` WHERE `id_user` IN ('.$user_id.')');
    }
}
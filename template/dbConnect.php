<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/28/18
 * Time: 11:50 AM
 */

class dbConnect
{
    public static function dbCon()
    {
        $host = 'localhost';

        $dbname = 'camagru';

        $user = 'root';

        $password = 'qwerty';
        //
        $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

        if ($db){
            return $db;
        }
        else{
            return false;
        }
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-06-29
 * Time: 16:35
 */

namespace App\Model\Logic;


use App\Controllers\Misc\Misc;

class DB
{
    private $table;
    private $where;
    private $select;
    private $insert;
    private $db_name;
    private $db_host;
    private $db_user;
    private $db_password;
    private $conn;
    private $res;

    public function __construct()
    {
        include_once ROOT . "/config/database.php";

        $this->db_name = $DB_DSN;
        $this->db_host = $DB_HOST;
        $this->db_user = $DB_USER;
        $this->db_password = $DB_PASSWORD;


        if (!$this->connect()){

            $mysqli = new \mysqli($this->db_host, $this->db_user, $this->db_password);

            $mysqli->query("CREATE DATABASE camagru");

            $mysqli->close();
            Misc::trace("No connect !");
        }

//        try {
//            $test = $this->PDO->query("SELECT * FROM users");
//        }
//        catch (\PDOException $PDOException){
//
//            exit(0);
//        }

//        Misc::trace($this->PDO);

    }

    public function table($table){
        $this->table = $table;
        return $this;
    }

    public function where($where = ""){
        $this->where = $where;
        return $this;
    }

    public function select($select = "*"){
        $this->select = $select;
        return $this;
    }

    public function insert($insert){
        /**
         * тут буде вставляти в базу
         */
        $result = "true or false";
        return $result;
    }

    public function get(){

        $res = $this->conn->query("SELECT {$this->select} FROM {$this->table} WHERE {$this->where}");

        $this->res = $res->fetchObject();
        return $this->res;
    }

    private function connect(){
//        Misc::trace("dddd");
//        try {
////            Misc::trace2(1, $this->db_name, $this->db_user, $this->db_host, $this->db_password);
////            $this->PDO = new \PDO("mysql:host=$this->db_host;dbname=camagru",$this->db_user, $this->db_password);
//            Misc::trace(new \PDO("mysql:host=$this->db_host;dbname=camagru",$this->db_user, $this->db_password));
////            Misc::trace($this->PDO);
//        }
//        catch (\PDOException $PDOException){
//            print_r($PDOException->getMessage());
//            exit(0);
//        }

        try {
            $this->conn = new \PDO("mysql:host=$this->db_host;dbname=camagru", $this->db_user, $this->db_password);
            // set the PDO error mode to exception
//            $conn->setAttribute(\PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//            echo "Connected successfully";
        }
        catch(\PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }

        return true;
    }
}
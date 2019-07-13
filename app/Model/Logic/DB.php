<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-06-29
 * Time: 16:35
 */

namespace App\Model\Logic;

use Config\database;

use App\Controllers\Misc\Misc;

class DB
{
    private $table;
    private $where;
    private $select;
    private $insert;
    private $innerJoin;
    private $update;
    private $limit;
    private $db_name;
    private $db_host;
    private $db_user;
    private $db_password;
    private $conn;
    private $res;

    public function __construct()
    {
        $databaseSetting = new database();

        $this->db_name = $databaseSetting->DB_DSN;
        $this->db_host = $databaseSetting->DB_HOST;
        $this->db_user = $databaseSetting->DB_USER;
        $this->db_password = $databaseSetting->DB_PASSWORD;


        if (!$this->connect()){

            $mysqli = new \mysqli($this->db_host, $this->db_user, $this->db_password);

            $mysqli->query("CREATE DATABASE camagru");

            $mysqli->close();
            Misc::trace("No connect !");
        }

        $this->innerJoin = "";

    }

    public function update($update){

        $keys = array_keys($update);
        $value = array_values($update);
        $flag = 0;
        $this->update = "";
//        Misc::trace2(1, $update, $keys);
        foreach ($keys as $key) {
            if ($flag)
                $this->update .= ", ";
            $this->update .= "{$key}='{$update[$key]}'";
            $flag = 1;
        }

        if (isset($this->innerJoin)){
            $query = "UPDATE {$this->table} {$this->innerJoin} SET {$this->update} WHERE {$this->where}";
        }
        else{
            $query = "UPDATE {$this->table} SET {$this->update} WHERE {$this->where}";
        }


        try {
            $result = $this->conn->query($query);
        }
        catch (\PDOException $exception){
            Misc::trace($exception);
        }
//Misc::trace($query);
        return $result;

        Misc::trace($query);
    }

    public function join($table_name, $first, $operator, $second){
        $this->innerJoin .= "INNER JOIN {$table_name} ON {$first}{$operator}{$second} ";
        return $this;
    }

    public function table($table){
        $this->table = $table;
        return $this;
    }

    public function where($where = ""){
        $whereStr = "";
        $flag = 0;

        if (is_array($where)){
            foreach ($where as $key => $value) {
                if ($flag)
                    $whereStr .= " AND ";
                $whereStr .= "$key='$value'";
                $flag = 1;
            }

            $this->where = $whereStr;
        }
        else
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
        $keys = array_keys($insert);
        $values = array_values($insert);

        $flag = 0;
        $keyInsert = "";
        foreach ($keys as $key) {
            if ($flag)
                $keyInsert .= ", ";
            $keyInsert .= "$key";
            $flag = 1;
        }

        $flag = 0;
        $valueInsert = "";
        foreach ($values as $value) {
            if ($flag)
                $valueInsert .= ", ";
            $valueInsert .= "'$value'";
            $flag = 1;
        }

        $query = "INSERT INTO $this->table ($keyInsert) VALUES ($valueInsert)";
//Misc::trace($query);
        try {
            $result = $this->conn->query($query);
        }
        catch (\PDOException $exception){
            Misc::trace($exception);
        }
        if ($result)
            return $this->conn->lastInsertId();
        return $result;
    }

    public function get(){

        $query = "SELECT ";

        if (isset($this->select)) {
            $query .= $this->select . " ";
        }
        else
            $query .= "* ";

        $query .= "FROM $this->table ";

        if (isset($this->innerJoin))
            $query .= $this->innerJoin;

        if (isset($this->where))
            $query .= "WHERE $this->where";

        if (isset($this->limit))
            $query .= "LIMIT $this->limit";

        $res = $this->conn->query($query);
//Misc::trace($query);
//Misc::trace($res);
//Misc::trace(get_class_methods($res));
        if (!empty($res)) {
            $this->res = $res->fetchAll(\PDO::FETCH_CLASS);
        }
        else {
            $this->res = $res;
        }
        return $this->res;
    }

    public function limit($limit){
        $this->limit = $limit;
        return $this;
    }

    public function dropTable(){
        return $this->conn->query("DROP TABLE $this->table");
    }

    public function createTable($fieldsAndValue){
        $query = "CREATE TABLE $this->table (";
        $flag = 0;
        foreach ($fieldsAndValue as $key => $value) {
            if ($flag)
                $query .= ", ";
            $query .= "$key $value";
            $flag = 1;
        }
        $query .= ")";
        return (bool)$this->conn->query($query);
    }

    private function connect(){

        if (!isset($this->conn)) {
            try {
                $this->conn = new \PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_password);
            } catch (\PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        return true;
    }
}
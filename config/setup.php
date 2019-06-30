<?php
/**
 * Created by PhpStorm.
 * User: Taras
 * Date: 30.06.2019
 * Time: 15:22
 */

class setup
{

    private $table;

    public function __construct()
    {

//        print_r("config/database.php");
//        exit(0);
        include "database.php";

        $databaseSetting = new database();

//        exit(0);
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
    }

    public function createUserTable(){

        $fieldsTable = [
            'user_id' => 'int(11) AUTO_INCREMENT',
            'user_name' => 'varchar(255)',
            'user_email' => 'varchar(255)'
        ];

        $this->table = 'users';

        return $this->createTable($fieldsTable);
    }

    public function createPasswordTable(){
        $fieldsTable = [
            'pass_id' => 'int(11) AUTO_INCREMENT',
            'pass_user_id' => 'bigint(20)',
            'pass_password' => 'varchar(255)'
        ];

        $this->table = 'passwords';

        return $this->createTable($fieldsTable);
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
print_r($query);
        return (bool)$this->conn->query($query);
    }

    private function connect(){

        if (!isset($this->conn)) {
            try {
                $this->conn = new \PDO("mysql:host=$this->db_host;dbname=$this->db_name", $this->db_user, $this->db_password);
            echo "Connected successfully";
            } catch (\PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        return true;
    }
}

var_dump((new setup())->createUserTable());
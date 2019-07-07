<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-06-29
 * Time: 16:11
 */

namespace App\Model\Orm\User;

use App\Controllers\Misc\Misc;
use App\Model\Logic\DB;
use App\Model\Model;
use App\Interfaces\Model\User as UserInterface;

class User extends Model implements UserInterface
{
    static public $table = "users";

    static public function update($update, $where)
    {
        // TODO: Implement update() method.
//        return(new DB())->table("users")->drop();
//        return(new DB())->table("users3")->createTable([
//            'id' => 'int(11) AUTO_INCREMENT',
//            'name' => 'varchar(255)',
//            'PRIMARY' => 'KEY(id)'
//        ]);
    }

    static public function get($where)
    {
        // TODO: Implement get() method.

        return (new DB())
            ->table(self::$table)
            ->where($where)
            ->select("*")
            ->get();
    }

    static public function create($data)
    {
        // TODO: Implement create() method.

        return (new DB())
            ->table(self::$table)
            ->insert($data);
    }

    static public function getUserByEmailAndPassword($where){
        return (new DB())->select('*')
            ->table(self::$table)
            ->join('passwords', 'users.user_pass_id', '=', 'passwords.pass_id')
            ->where($where)
            ->limit(1)
            ->get();
    }

}
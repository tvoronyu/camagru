<?php
/**
 * Created by PhpStorm.
 * User: Taras
 * Date: 30.06.2019
 * Time: 21:50
 */

namespace App\Model\Orm\PreReg;

use App\Model\Logic\DB;
use App\Model\Model;

class PreReg extends Model
{
    static public $table = "pre_registration";

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

        return (new DB())->table(self::$table)->where($where)->select("*")->get();
    }

    static public function create($data)
    {
        // TODO: Implement create() method.

        return (new DB())->table(self::$table)->insert($data);
    }
}
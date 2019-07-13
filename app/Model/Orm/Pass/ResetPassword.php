<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-07-06
 * Time: 16:01
 */

namespace App\Model\Orm\Pass;

use App\Interfaces\Main;
use App\Model\Logic\DB;
use App\Model\Model;

class ResetPassword extends Model implements Main
{
    static public $table = "reset_passwords";

    static public function update($update, $where)
    {
        // TODO: Implement update() method.
    }

    static public function get($where)
    {
        // TODO: Implement get() method.
    }

    static public function create($data)
    {
        return (new DB())->table(self::$table)->insert($data);
    }

}
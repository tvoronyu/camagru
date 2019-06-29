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
        // TODO: Implement create() method.

//        $res = (new DB())->get();
//
//        Misc::trace($res);
//
//        return;
        $user = (new DB())->table('users')->where('id = 1')->select("*")->get();

        Misc::trace($user);
    }

}
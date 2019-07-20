<?php


namespace App\Model\Orm\Comment;

use App\Model\Logic\DB;
use App\Model\Model;

class Comment extends Model
{

    static private $table = "comment";

    static public function updateComment($update, $where)
    {
        return (new DB())->table(self::$table)->where($where)->update($update);
    }

    static public function getComment($where)
    {
       return (new DB())->table(self::$table)->where($where)->get();
    }

    static public function createComment($data)
    {
        return (new DB())->table(self::$table)->insert($data);
    }

}
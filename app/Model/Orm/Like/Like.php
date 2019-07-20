<?php

namespace App\Model\Orm\Like;

use App\Model\Logic\DB;
use App\Model\Model;

class Like extends Model
{

    static public $table = "like_photo";

    static public function updateLike($update, $where)
    {
        return (new DB())->table(self::$table)->where($where)->update($update);
    }

    static public function getLike($where)
    {
       return (new DB())->table(self::$table)->where($where)->get();
    }

    static public function getLikeCount($where)
    {
        return (new DB())->table(self::$table)->select(" COUNT(*) as count")->where($where)->get();
    }

    static public function createLike($data)
    {
        return (new DB())->table(self::$table)->insert($data);
    }

    static public function getLikeByPhoto($where)
    {
       return (new DB())->table(self::$table)
           ->join('users_photo',self::$table.'like_photo_id','=','users_photo.photo_id')
           ->where($where)
           ->get();
    }

}
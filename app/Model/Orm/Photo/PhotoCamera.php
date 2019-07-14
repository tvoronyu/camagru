<?php


namespace App\Model\Orm\Photo;


use App\Model\Logic\DB;
use App\Model\Model;

class PhotoCamera extends Model
{
    static public $table = "users_photo";

    static public function getAllPhoto($where){
        return (new DB())->table(self::$table)->where($where)->sortBy('photo_id', 'desc')->get();
    }

    static public function setNewPhoto($data){
        return (new DB())->table(self::$table)->insert($data);
    }

    static public function updatePhoto($where, $update){
        return (new DB())->table(self::$table)->where($where)->update($update);
    }
}
<?php

namespace App\Model\Orm\Photo;

use App\Model\Logic\DB;
use App\Model\Model;

class PhotoGallery extends Model
{

    static public $table = 'users_photo';

    static public function updatePhotoGallery($update, $where)
    {
        // TODO: Implement update() method.
    }


    static public function getPhotoGallery($where)
    {
        return (new DB())->table(self::$table)
            ->where($where)
            ->get();
    }

    static public function createPhotoGallery($data)
    {
        // TODO: Implement create() method.
    }

}
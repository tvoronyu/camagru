<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-07-12
 * Time: 15:01
 */

namespace App\Views;

use App\Controllers\Misc\Request;
use App\Controllers\ViewController;
use App\Model\Orm\Photo\PhotoCamera;

class Gallery extends ViewController
{
    public function getGallery(Request $request)
    {

//        if (!$this->auth())
//            header("location:/login");

        $wherePhoto = [
//            'photo_user_id' => $_SESSION['account']['user_id'],
            'photo_del' => 0
        ];

        $photos = PhotoCamera::getAllPhoto($wherePhoto);

        include ROOT . "/views/gallery/index.php";
    }


    public function getMyGallery(Request $request){

        if (!$this->auth())
            header("location:/login");

        $wherePhoto = [
            'photo_user_id' => $_SESSION['account']['user_id'],
            'photo_del' => 0
        ];

        $photos = PhotoCamera::getAllPhoto($wherePhoto);

        include ROOT . "/views/my_gallery/index.php";
    }
}
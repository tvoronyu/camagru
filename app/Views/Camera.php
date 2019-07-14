<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-07-06
 * Time: 14:41
 */

namespace App\Views;

use App\Controllers\Misc\Misc;
use App\Controllers\Misc\Request;
use App\Controllers\ViewController;
use App\Model\Orm\Photo\PhotoCamera;

class Camera extends ViewController
{

    public function getCamera(Request $request)
    {

        if (!$this->auth())
            header("location:/login");

        $wherePhoto = [
            'photo_user_id' => $_SESSION['account']['user_id'],
            'photo_del' => 0
        ];

        $photos = PhotoCamera::getAllPhoto($wherePhoto);

        include ROOT . "/views/camera/index.php";
    }
}
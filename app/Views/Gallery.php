<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-07-12
 * Time: 15:01
 */

namespace App\Views;

use App\Controllers\Misc\Misc as app;
use App\Controllers\Misc\Request;
use App\Controllers\ViewController;
use App\Model\Orm\Like\Like;
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

        $photos2 = [];

        $photos = PhotoCamera::getAllPhoto($wherePhoto);

//        app::trace($photos);

//        app::trace($photos);

        if (!empty($photos)){

            foreach ($photos as $photo) {
                $photo = (array)$photo;

//                app::trace($photo, false);

                $whereLike = [
                    'like_del' => 0,
                    'like_photo_id' => $photo['photo_id']
                ];

                if (empty($like = Like::getLikeCount($whereLike))){
                    $photo['like'] = "";
                }
                else{
//                    app::trace($like);
                    $photo['like'] = $like[0]->count;
                }

                $photos2[] = $photo;
//                app::trace($like);
            }

            $photos = $photos2;
//            app::trace($photos);

            include ROOT . "/views/gallery/index.php";
        }
        else {

            foreach ($photos as $photo) {
                $photo = (array)$photo;
                $photos2[] = $photo;
            }

            $photos = $photos2;

            include ROOT . "/views/gallery/index.php";
        }

    }


    public function getMyGallery(Request $request){

        if (!$this->auth())
            header("location:/login");



//        if (!$this->auth())
//            header("location:/login");

        $wherePhoto = [
            'photo_user_id' => $_SESSION['account']['user_id'],
            'photo_del' => 0
        ];

        $photos2 = [];

        $photos = PhotoCamera::getAllPhoto($wherePhoto);

//        app::trace($photos);

//        app::trace($photos);

        if (!empty($photos)){

            foreach ($photos as $photo) {
                $photo = (array)$photo;

//                app::trace($photo, false);

                $whereLike = [
                    'like_del' => 0,
                    'like_photo_id' => $photo['photo_id']
                ];

                if (empty($like = Like::getLikeCount($whereLike))){
                    $photo['like'] = "";
                }
                else{
//                    app::trace($like);
                    $photo['like'] = $like[0]->count;
                }

                $photos2[] = $photo;
//                app::trace($like);
            }

            $photos = $photos2;
//            app::trace($photos);

            include ROOT . "/views/gallery/index.php";
        }
        else {

            foreach ($photos as $photo) {
                $photo = (array)$photo;
                $photos2[] = $photo;
            }

            $photos = $photos2;

            include ROOT . "/views/gallery/index.php";
        }

    }
}
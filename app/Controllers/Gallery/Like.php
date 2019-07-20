<?php


namespace App\Controllers\Gallery;


use App\Controllers\Auth\Auth;
use App\Controllers\Controller;
use App\Controllers\Misc\Request;
use App\Controllers\Misc\Misc as app;
use App\Model\Orm\Photo\PhotoGallery;
use App\Model\Orm\Like\Like as LikeOrm;
use App\Model\Orm\User\User;

class Like extends Controller
{

    public function setLike(Request $request){

        /**
         * It is here must be validation
         */

        if (($res = (new Auth())->auth2($request)) && $res['status'] == 0)
            return $res;

        $namePhoto = $request->get('photo_name');



//        app::trace2(1,PhotoGallery::getPhotoGallery(['photo_name' => $namePhoto, 'photo_del' => 0]), $namePhoto);

        if (empty($photo = PhotoGallery::getPhotoGallery(['photo_name' => $namePhoto, 'photo_del' => 0])))
            return ['status' => 0, 'msg' => 'Photo is not exist'];

        if (empty($photo[0]))
            return ['status' => 0, 'msg' => 'Photo is not exist'];

        $photo = (array)$photo[0];

        $whereLike = [
            'like_del' => 0,
            'like_user_id' => $_SESSION['account']['user_id'],
            'like_photo_id' => $photo['photo_id']
        ];

        $userOwnerByPhotoId = $photo['photo_user_id'];

        $user = User::get(['user_id' => $userOwnerByPhotoId]);

        if (!empty($like = LikeOrm::getLike($whereLike))){

            if (empty($like[0]))
                return ['status' => 0, 'msg' => 'Photo is not exist'];

            $like = (array)$like[0];

            $updateLike = [
                'like_del' => 1,
            ];

            LikeOrm::updateLike($updateLike, $whereLike);


            unset($whereLike['like_user_id']);

            $likeCount = LikeOrm::getLikeCount($whereLike)[0]->count;

            $html = "You lost one like  http://camagru.website";

            if (!empty($user))
                if ($user[0]->user_notification == 1)
                    $this->sendEmail($user[0]->user_email, "You have a new notification", $html);

            return $this->middleResponse(['countLike' => $likeCount]);
        }

        $createLike = [
            'like_photo_id' => $photo['photo_id'],
            'like_owner_photo_id' => $photo['photo_user_id'],
            'like_user_id' => $_SESSION['account']['user_id'],
        ];

        $idNewLike = LikeOrm::createLike($createLike);

        $html = "You have a new like http://camagru.website";

        if (!empty($user))
            if ($user[0]->user_notification == 1)
                $this->sendEmail($user[0]->user_email, "You have a new notification", $html);

        unset($whereLike['like_user_id']);
        $likeCount = LikeOrm::getLikeCount($whereLike)[0]->count;

        return $this->middleResponse(['like_id' => $idNewLike,'countLike' => $likeCount]);

    }
}
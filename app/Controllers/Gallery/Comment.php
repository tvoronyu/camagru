<?php


namespace App\Controllers\Gallery;


use App\Controllers\Auth\Auth;
use App\Controllers\Controller;
use App\Controllers\Misc\Request;
use App\Controllers\Misc\Misc as app;
use App\Model\Orm\Comment\Comment as CommentOrm;
use App\Model\Orm\Photo\PhotoGallery;
use App\Model\Orm\User\User;


class Comment extends Controller
{
    public function setComment(Request $request){

        if (($res = (new Auth())->auth2($request)) && $res['status'] == 0)
            return $res;

        $userId = $_SESSION['account']['user_id'];
        $user = User::get(['user_id' => $userId,'user_del' => 0]);
        $user = (array)$user[0];
        $namePhoto = $request->get('photo_name');
        $photo = PhotoGallery::getPhotoGallery(['photo_name'=>$namePhoto]);

        if (empty($photo))
            return ['status' => 0, "msg"=>"Photo is not exist"];

        $photo = (array)$photo[0];

        $content = $request->get('text');
        $date =date("Y-m-d H:i:s");
        $createComment = [
            'cm_photo_id' => $photo['photo_id'],
            'cm_user_id' => $userId,
            'cm_content' => $content,
            'cm_created_at' => $date,
            'cm_user_name' => $user['user_name'],
        ];

        $date = explode(' ', $date)[1];

        CommentOrm::createComment($createComment);

        return $this->middleResponse(['request' => $request->all(),'text'=>$request->get('text'), "records"=>[
            [
                "text"=>"{$createComment['cm_user_name']} $date <br><span class='text-danger' style='padding-left: 10px; font-family: "."Arial Black"."'>{$createComment['cm_content']}</span>",
            ],
        ]]);

    }

    public function getComment(Request $request){

        $namePhoto = $request->get('photo_name');
        $photo = PhotoGallery::getPhotoGallery(['photo_name'=>$namePhoto]);
        if (empty($photo))
            return ['status' => 0, "msg"=>"Photo is not exist"];
        $photo = (array)$photo[0];

        $comments = CommentOrm::getComment(['cm_photo_id' => $photo['photo_id'],'cm_del'=>0]);

        $records = [];

        foreach ($comments as $comment) {

            $comment = (array)$comment;

            $date = explode(' ',$comment['cm_created_at'])[1];

            $records[]['text'] = "{$comment['cm_user_name']} $date <br><span class='text-danger' style='padding-left: 10px; font-family: "."Arial Black"."'>{$comment['cm_content']}</span>";
        }

        return $this->middleResponse(['records'=>$records]);

    }


}
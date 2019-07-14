<?php


namespace App\Controllers\Camera;


use App\Controllers\Controller;
use App\Controllers\Misc\Request;
use App\Model\Orm\Photo\PhotoCamera;

class Camera extends Controller
{
    public function savePhoto(Request $request){

        $image = urldecode($request->get('image'));

        $image = preg_replace("~data:image/jpeg;base64,~","", $image);

        $image = base64_decode($image);

        $nameIMG = "img".time().".jpg";

        $nameIMG = 'user'.$_SESSION['account']['user_id'].'/'.$nameIMG;

        if (file_exists(ROOT.'/PhotoUsers/user'.$_SESSION['account']['user_id'])){
            $imagName = ROOT.'/PhotoUsers/'.$nameIMG;
            file_put_contents($imagName, $image);
        }
        else{
            mkdir(ROOT.'/PhotoUsers/user'.$_SESSION['account']['user_id'], 0777);
            $imagName = ROOT.'/PhotoUsers/'.$nameIMG;
            file_put_contents($imagName, $image);
        }

        $createPhoto = [
            'photo_user_id' => $_SESSION['account']['user_id'],
            'photo_name' => $nameIMG
        ];

        PhotoCamera::setNewPhoto($createPhoto);


        return $this->middleResponse();

    }
}
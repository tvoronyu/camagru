<?php
/**
 * Created by PhpStorm.
 * User: tvoronyu
 * Date: 10/30/18
 * Time: 6:11 PM
 */

class CameraController
{
    public function actionCapture(){

        include_once ROOT.'/views/camera/index.php';

        return true;
    }

    public function actionCaptureMakePhoto()
    {
//        if (($_POST['index'] || !$_POST['index']) && !empty($_POST['image'])) {
//            $string = preg_replace('~data:image/jpeg;base64,~', '', $_POST['image']);
//            $data = base64_decode($string);
//            file_put_contents('src.jpg', $data);
//            if (empty($data)) {
//                file_put_contents('error.txt', 'error_1');
//            } elseif (!$image = imagecreatefromstring($data)) {
//                file_put_contents('error.txt', 'error_2');
//            }
//            imagefilter($image, $_POST['index']);
//            imagejpeg($image, 'image.jpg', 100);
//            imagedestroy($image);
//            if ($file = file_get_contents('image.jpg')) {
//                $temp = base64_encode($file);
//                echo urlencode($temp);
//            }
//        }
//        elseif (($_POST['image'] == '')){
//            $tmp_1 = file_get_contents('src.jpg');
//            $tmp_2 = imagecreatefromstring($tmp_1);
//            imagefilter($tmp_2, $_POST['index']);
//            imagejpeg($tmp_2, 'image.jpg', 100);
//            imagedestroy($tmp_2);
//            if ($file = file_get_contents('image.jpg')) {
//                $temp = base64_encode($file);
//                echo urlencode($temp);
//            }
//        }
        $string = preg_replace('~data:image/jpeg;base64,~', '', $_POST['image']);
        $data = base64_decode($string);
        if (file_exists(ROOT.'/imgUsers/src.jpg')){
            unlink(ROOT.'/imgUsers/src.jpg');
        }
        file_put_contents(ROOT.'/imgUsers/src.jpg', $data);
        echo $string;
        return true;
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Taras
 * Date: 08.07.2019
 * Time: 23:16
 */

namespace App\Controllers\Test;


use App\Controllers\Controller;
use App\Controllers\Misc\Misc;
use App\Controllers\Misc\Request;

class Test extends Controller
{
    public function test(Request $request){

//        return $this->middleResponse();

//        $image = base64_decode($request->get('image'));
        $image = urldecode($request->get('image'));

        $image = preg_replace("~data:image/jpeg;base64,~","", $image);

        Misc::trace($image);

        $image = base64_decode($image);

        file_put_contents(ROOT.'/src.jpg', $image);

        Misc::trace(__DIR__);
    }
}
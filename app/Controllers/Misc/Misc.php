<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-06-29
 * Time: 13:42
 */

namespace App\Controllers\Misc;


use App\Controllers\Controller;

class Misc extends Controller
{
    static public function trace($var,$exit= true){
        echo "<pre>";
        print_r($var);
        echo "</pre>";
        if($exit)exit;
    }

    static public function trace2($type=true,...$data){
        try {
            if ($type) {
                if (isset($data[1])) {
                    foreach ($data as $item) {
                        print_r($item);
                        echo "\n<--------------->\n";
                    }
                } else {
                    print_r($data[0]);
                    echo "\n<--------------->\n";
                }
            } else {
                if (isset($data[1])) {
                    foreach ($data as $item) {
                        var_dump($item);
                        echo "\n<--------------->\n";
                    }
                } else {
                    var_dump($data[0]);
                    echo "\n<--------------->\n";
                }
            }
            exit;
        }
        catch (\Error $error){

        }
    }

    static public function strings_clear($string){
        $string = \trim($string);
        $string = \strip_tags(\stripslashes($string));
        return $string;
    }
}
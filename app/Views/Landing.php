<?php
/**
 * Created by PhpStorm.
 * User: Taras
 * Date: 30.06.2019
 * Time: 16:49
 */

namespace App\Views;


class Landing
{
    public function getLanding(){
        include ROOT . "/views/main/index.php";
    }
}
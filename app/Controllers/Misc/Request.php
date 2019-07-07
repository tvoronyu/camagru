<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-07-06
 * Time: 12:35
 */

namespace App\Controllers\Misc;

use App\Controllers\Misc\Misc;
use App\Controllers\Misc\Clear;
use App\Controllers\Misc\Validate;

class Request
{
    private $request;

    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET")
            $this->request = $_GET;

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $inputJSON = file_get_contents('php://input');
            $this->request = json_decode($inputJSON, TRUE);
        }

        if (is_array($this->request))
            (new Clear())->handle($this->request);

        $this->validator = new Validate();
    }



    public function get($key){
        if (isset($this->request[$key]))
            return $this->request[$key];
        return "";
    }



}
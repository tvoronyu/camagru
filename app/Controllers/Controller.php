<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-06-29
 * Time: 12:38
 */

namespace App\Controllers;

use App\Controllers\Misc\Misc;
use App\Controllers\Misc\Clear;
use App\Controllers\Misc\Validate;
use App\FrontController;

class Controller extends FrontController
{
    public $request;
    public $validator;

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
}
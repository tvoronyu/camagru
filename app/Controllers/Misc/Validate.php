<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-06-29
 * Time: 16:03
 */

namespace App\Controllers\Misc;


class Validate
{

    public $patterns = array(
        'uri'           	=> '[A-Za-z0-9-\/_?&=]+',
        'url'           	=> '[A-Za-z0-9-:.\/_?&=#]+',
        'alpha'         	=> '[\p{L}]+',
        'words'         	=> '[\p{L}\s]+',
        'alphanum'      	=> '[\p{L}0-9]+',
        'int'           	=> '[0-9]+',
        'float'         	=> '[0-9\.,]+',
        'tel'           	=> '[0-9+\s()-]+',
        'text'          	=> '[\p{L}0-9\s-.,;:!"%&()?+\'°#\/@]+',
        'file'          	=> '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+\.[A-Za-z0-9]{2,4}',
        'folder'        	=> '[\p{L}\s0-9-_!%&()=\[\]#@,.;+]+',
        'address'       	=> '[\p{L}0-9\s.,()°-]+',
        'date_dmy'      	=> '[0-9]{1,2}\-[0-9]{1,2}\-[0-9]{4}',
        'date_ymd'      	=> '[0-9]{4}\-[0-9]{1,2}\-[0-9]{1,2}',
        'calendar'      	=> '^\s*(3[01]|[12][0-9]|0[1-9])\/(1[012]|0[1-9])\/((?:19|20)\d{2})\s*$',
        'mysql_date_format' => '^\s*((?:19|20)\d{2})\-(1[012]|0[1-9])\-(3[01]|[12][0-9]|0[1-9])\s*$',
        'email'         	=> '[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+.[a-zA-Z0-9-.]+',
        'lang'         		=> 'en|fr|es',
        'cfield_type'       => 'text|date',
        'discount_type'     => 'percent|fixed',
        'status_act_inact' 	=> 'active|inactive',
        'password'			=> '[\\S]+',
        'name'				=> '[a-zA-Z]{2,30}',
        'state'				=> '[a-zA-Z]{2,10}',
        'date'				=> '[0-9-]+',
        'contract_duration_type' => 'months|years|weeks',
    );

    public function name($name){

        $this->name = $name;
        return $this;

    }

    public function value($value) {

        $this->value = $value;
        return $this;

    }

    public function file($value) {

        $this->file = $value;
        return $this;

    }

    public function pattern($name) {

        if ($name == 'array') {

            if (!is_array($this->value)) {
                $this->setError(10013, "incorrect type of parameter");
            }

        } else {
            $regex = '/^('.$this->patterns[$name].')$/u';
            if ($this->value != '' && !preg_match($regex, $this->value)) {
                $this->setError(10013, "incorrect type of parameter");
            }

        }
        return $this;

    }

    public function customPattern($pattern) {

        $regex = '/^('.$pattern.')$/u';
        if ($this->value != '' && !preg_match($regex, $this->value)) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;

    }



    public function required() {

        if ((isset($this->file) && $this->file['error'] == 4) || ($this->value === '' || $this->value === null || empty($this->value))) {
            $this->setError(10006, "not enough variables");
        }
        return $this;

    }

    public function min($length) {


        if (is_string($this->value)) {

            if (strlen($this->value) < $length && strlen($this->value) != 0) {
                $this->setError(10013, "incorrect type of parameter");
            }

        } else {

            if ($this->value < $length) {
                $this->setError(10013, "incorrect type of parameter");
            }

        }

        return $this;

    }

    public function max($length) {

        if (is_string($this->value)) {

            if (strlen($this->value) > $length) {
                $this->setError(10013, "incorrect type of parameter");
            }

        } else {

            if ($this->value > $length) {
                $this->setError(10013, "incorrect type of parameter");
            }

        }
        return $this;

    }

    public function equal($value) {

        if ($this->value != $value) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;

    }

    public function maxSize($size) {

        if ($this->file['error'] != 4 && $this->file['size'] > $size) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;

    }

    public function ext($extension) {

        if ($this->file['error'] != 4 && pathinfo($this->file['name'], PATHINFO_EXTENSION) != $extension && strtoupper(pathinfo($this->file['name'], PATHINFO_EXTENSION)) != $extension) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;

    }

    public function clear() {
        $this->value = \trim(\strip_tags(\stripslashes($this->value)));

        return $this;
    }

    public function isSuccess() {
        if (empty($this->error)) {
            return true;
        }
    }

    public function getError() {
        if (!$this->isSuccess()) {
            return $this->error;
        }
    }

    public function setError($code=10000, $msg="", $responcecode=400) {
        if (empty($this->error)) {
            http_response_code($responcecode);
            $this->error['status'] = 0;
            $this->error['msg'] = $msg;
            $this->error['code'] = $code;
        }
    }

    public function result() {

        if (!$this->isSuccess()) {

            foreach ($this->getError() as $error) {
                echo "$error\n";
            }
            exit;

        } else {
            return true;
        }

    }

    public function is_int() {
        if (!filter_var($this->value, FILTER_VALIDATE_INT)) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }

    public function is_float() {
        if (!filter_var($this->value, FILTER_VALIDATE_FLOAT)) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }

    public function is_alpha() {
        if (!filter_var($this->value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z]+$/")))) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }

    public function is_alphanum() {
        if (!filter_var($this->value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z0-9]+$/")))) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }

    public function is_url() {
        if (!filter_var($this->value, FILTER_VALIDATE_URL)) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }

    public function is_uri() {
        if (!filter_var($this->value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[A-Za-z0-9-\/_]+$/")))) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }

    public function is_bool() {
        if (!filter_var($this->value, FILTER_VALIDATE_BOOLEAN)) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }

    public function is_email() {
        if (!filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }

    public function maxNumber($length)
    {
        if($this->value > $length){
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }

    public function isDiscountValid() {
        if ($this->value < 0 || $this->value > 100) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }

    public function isRateValid() {
        if ($this->value < 0) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }

    public function isRateTypeValid() {
        $types = ['hour', 'day', 'week', 'month', 'year'];
        if (!in_array($this->value, $types)) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }

    public function isPostalCode() {
        if ($this->is_alpha($this->value) || !is_numeric($this->value)) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }

    public function validatePhoneNumber() {
        if (is_string($this->value)) {
            if (strlen($this->value) > 0) {
                if ($this->is_alpha($this->value) || !is_numeric($this->value)) {
                    $this->setError(10013, "incorrect type of parameter");
                }

                return $this;
            }
        }
    }

    public function checkFullPhoneNumber($code, $number) {
        if (($code . $number) != $this->value) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }


    public function pictureFormat() {
        if ($this->value) {
            $array = explode('.', $this->value);
            $format = end($array);
            if ($format !== 'jpg' && $format !== 'png' && $format !== 'jpeg' && $format !== 'gif') {
                $this->setError(10013, "incorrect type of parameter");
            }
        }
        return $this;
    }

    public function isMonth() {
        $array = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
        if (!in_array($this->value, $array)) {
            $this->setError(10014, "item not found");
        }
        return $this;
    }

    public function dateNotLessThanCurrent() {
        if ($this->value < date('Y-m-d')) {
            $this->setError(10013, "incorrect type of parameter");
        }
        return $this;
    }
}
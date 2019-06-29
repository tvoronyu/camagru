<?php

namespace App\Interfaces;

interface Main
{
    /**
     * @param $update
     * @param $where
     * @return mixed
     */
    static public function update($update, $where);

    /**
     * @param $where
     * @return mixed
     */
    static public function get($where);

    /**
     * @param $data
     * @return mixed
     */
    static public function create($data);
}
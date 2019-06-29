<?php
/**
 * Created by PhpStorm.
 * User: taras
 * Date: 2019-06-29
 * Time: 15:34
 */

namespace App\Controllers\Misc;


class Clear
{

    public function handle(&$request)
    {
        if (true) { /**true == continue with clear or false == continue without clear*/
            $keys = array_keys($request);
            $r = $request;
            $this->clear($keys, $r);
            $request = $r;
        }

    }

    private function clear($keys, &$r){
        foreach ($keys as $key) {
            if (is_array($r[$key])) {
                $this->clear(array_keys($r[$key]), $r[$key]);
                continue;
            }
            $r[$key] = Misc::strings_clear($r[$key]);
        }
    }

}

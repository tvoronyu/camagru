<?php
/**
 * Created by PhpStorm.
 * User: Taras
 * Date: 06.07.2019
 * Time: 20:46
 */

namespace App\Views;

use App\Controllers\Misc\Misc;

class HTML
{
    // deafult folder for html pages (templates)
    static private $folder = 'html';
    // change default folder for html templates
    static public function changeFolder($folder) {
        self::$folder = $folder;
    }

    static public function render($template, $data = array()) {
        $content = file_get_contents(self::$folder."/{$template}.html");
        $content = self::design_render_text($content, $data);
        return $content;
    }

    static private function design_render_text($content, $data = array()) {
        $content = self::design_parse_function($content, $data);
        $content = self::design_parse($content, $data);
        return $content;
    }
    static private function design_parse_function($content, $data = array()) {
        preg_match_all('/\<\<(.*?)\>\>/is', $content, $res);
        if (@$res[1])
            foreach ($res[1] as $el) {
                $middle = self::design_parse($el, $data);
                $middle = '$result = '.$middle.';';
                eval($middle);

                $content = str_ireplace('<<'.$el.'>>', $res, $content);
            }
        return $content;
    }
    static private function design_parse($content, $data) {
        preg_match_all('/\%\%(.*?)\%\%/si', $content, $res);
        if (@$res[1])
            foreach ($res[1] as $el) $content = str_ireplace('%%'.$el.'%%', $data[$el], $content);
        return $content;
    }
}
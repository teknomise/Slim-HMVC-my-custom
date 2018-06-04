<?php
  /**
 * @Author: Risdyanto Kurniawan
 * @Date:   2018-03-07 13:05:51
 * @Last Modified by:   risdyanto
 * @Last Modified time: 
 */
namespace Helpers;

class Assets 
{  
    public static function default_assets($type)
    {
        switch ($type) {
            case 'css':
                return [
                    "main-framework.css",
                    "font-awesome.min.css",
                    "main-style.css"
                ];
                break;
            case 'js':
                return [
                    "vendor/jquery-3.3.1.min.js",
                    "vendor/axios.min.js",
                    "main-framework.js",
                    "global.js"
               ];
                break;
            default:
                break;
        }
    }

    public static function css($data = array(), $refresh = FALSE)
    {  
       $main_css = self::default_assets('css'); 
       $all_css = "";
       $token = ($refresh) ? "?v=".bin2hex(random_bytes(6)) : "";

        if(count($data) > 0){
            $main_css = array_merge($main_css, $data);
            foreach ($main_css as $value) {      
                $all_css .= '<link rel="stylesheet" href="'.BASE_URL.'assets/css/'.$value.$token.'" />';
            }
        } else {
            foreach ($main_css as  $value) {
                $all_css .= '<link rel="stylesheet" href="'.BASE_URL.'assets/css/'.$value.$token.'" />';
            }
        }

        return $all_css;
    }

    public static function js($data = array(), $refresh = FALSE)
    {   
        $main_js = self::default_assets('js'); 
        $all_js = "";
        $token = ($refresh) ? "?v=".bin2hex(random_bytes(6)) : "";

        if(count($data) > 0){
            $main_js = array_merge($main_js, $data);
            foreach ($main_js as $value) {
                $all_js .= '<script src="'.BASE_URL.'assets/js/'.$value.$token.'"></script>';
            }
        } else {
            foreach ($main_js as $value) {
                $all_js .= '<script src="'.BASE_URL.'assets/js/'.$value.$token.'"></script>';
            }
        }
       
        return $all_js;
    }
}
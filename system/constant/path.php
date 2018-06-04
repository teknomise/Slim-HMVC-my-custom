<?php
/********************************************
 * @Author: Risdyanto Kurniawan
 * @Date:   7 Mei 2018
 * @Last Modified by: Risdyanto
 * @Last Modified time: 24 Mei 2018 
 *********************************************/

 ///// System Path
define("RAMO_PATH_ROOT", realpath(dirname(__FILE__).'/../../../').'/public');
define("PATH_ROOT", __DIR__ . '/../../');
define("PATH_COMPONENT", PATH_ROOT . 'application/');
define("PATH_SLIM_VENDOR", PATH_ROOT . 'vendor/');
define("PATH_PHOTO_TMP_FOLDER", PATH_ROOT . 'var/tmp/photo-resize/');

// path http should be changed dynamically
define("BASE_URL", "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME'])); 
define("PATH_MAIN_ASSET", PATH_ROOT . 'public/assets/');
define("PATH_CSS", PATH_ROOT . 'public/assets/css/');
define("PATH_JS", PATH_ROOT . 'public/assets/js/');

///// Image Path
define("IMAGE_CDN_RESIZE", "https://static.rajamobil.com/resize/");
define("IMAGE_CDN_DROP", "https://static.rajamobil.com/crop/");

///// JSON File in Public JSON
define("MOTOR_MEREK", "/json/global/merek-motor.json");

define("JSON_GLOBAL", "/json/global/");
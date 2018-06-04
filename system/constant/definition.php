<?php

require PATH_ROOT . "system/constant/database.php";
require PATH_ROOT . "system/constant/template.php";

define("STATUS_CODE_SUCCESS", 200); // OK
define("STATUS_CODE_FAIL", 401); // default
define("STATUS_CODE_ERROR", 500); // Server Error
define("STATUS_CODE_FORBIDDEN", 403); // forbidden
define("STATUS_CODE_UNAUTHORIZED", 401); // forbidden
define("STATUS_CODE_METHOD_NOT_ALLOWED", 405); // Method not allowed
define("STATUS_CODE_NOT_FOUND", 404); // Not found
define("STATUS_CODE_BAD_REQUEST", 400); // Bad request from client
define("NUM_PER_PAGE", 50);
define("DEFAULT_PAGE_NAME", "page");

// ENUM for IMAGE RESIZER
define("IMAGE_EXTENSION_FILE_JPG", 'jpg');
define("IMAGE_EXTENSION_FILE_JPEG", 'jpeg');
define("IMAGE_EXTENSION_FILE_PNG", 'png');
define("IMAGE_EXTENSION_FILE_GIF", 'gif');
define("IMAGE_FOLDER", 'cache'); // Default name on local folder
define("IMAGE_QUALITY", '90');

define("IMAGE_SIZE_LARGE_RESOLUTION", '3500 x 3500'); // Large px
define("IMAGE_SIZE_MEDIUM_RESOLUTION", '1500 x 1500'); // Medium px
define("IMAGE_SIZE_SMALL_RESOLUTION", '1000 x 1000'); // Small px
define("IMAGE_SIZE_SLIDER_RESOLUTION", '1380 x 750'); // Thumbnail px
define("IMAGE_SIZE_THUMBNAIL_SLIDER", '150 x 150');

define("IMG_HOME_BANNER", '1440x360/media/images/banner/');

define("MOTOR_HOME_CONTROLLER", "index");


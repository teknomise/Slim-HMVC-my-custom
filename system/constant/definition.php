<?php

/**
 * @Author: mikegani
 * @Date:   2016-03-21 16:06:12
 * @Last Modified by:   mikegani
 * @Last Modified time: 2016-12-14 14:57:26
 */

require PATH_ROOT . "system/constant/database.php";

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


// ENUM for INSERT DB STATUS
define("INSERT_DB_FAIL", 0); // default
define("INSERT_DB_SUCCESS", 1);
define("INSERT_DB_FAIL_COLUMN_NAME_DOESNT_EXIST", -1);
define("INSERT_DB_FAIL_COLUMN_NAME_EXIST_BUT_GUARDED", -2);
define("INSERT_DB_FAIL_NOT_LOGIN", -3);

// ENUM for UPDATE DB STATUS
define("UPDATE_DB_FAIL", 0); // default
define("UPDATE_DB_SUCCESS", 1);
define("UPDATE_DB_FAIL_COLUMN_NAME_DOESNT_EXIST", -1);
define("UPDATE_DB_FAIL_COLUMN_NAME_EXIST_BUT_GUARDED", -2);
define("UPDATE_DB_FAIL_NOT_LOGIN", -3);

// ENUM for check column name is editable and not guarded
define("DB_COLUMN_NAME_DOESNT_EXIST", -1);
define("DB_COLUMN_NAME_EXIST", 1); // default
define("DB_COLUMN_NAME_IS_NOT_EDITABLE", 0);
define("DB_COLUMN_NAME_IS_EDITABLE", 1); // default


// ENUM for IMAGE RESIZER
define("IMAGE_EXTENSION_FILE_JPG", 'jpg');
define("IMAGE_EXTENSION_FILE_JPEG", 'jpeg');
define("IMAGE_EXTENSION_FILE_PNG", 'png');
define("IMAGE_EXTENSION_FILE_GIF", 'gif');
define("IMAGE_EXTENSION_FILE_PDF", 'pdf');
define("IMAGE_EXTENSION_FILE_ZIP", 'zip');
define("IMAGE_EXTENSION_FILE_RAR", 'rar');
define("IMAGE_EXTENSION_FILE_DOC", 'doc');
define("IMAGE_EXTENSION_FILE_DOCX", 'docx');
define("IMAGE_EXTENSION_FILE_XLS", 'xls');
define("IMAGE_EXTENSION_FILE_XLSX", 'xlsx');
define("IMAGE_EXTENSION_FILE_PPT", 'ppt');
define("IMAGE_EXTENSION_FILE_PPTX", 'pptx');
define("IMAGE_EXTENSION_FILE_SKP", 'skp');
define("IMAGE_EXTENSION_FILE_DWG", 'dwg');
define("IMAGE_FOLDER", 'cache'); // Default name on local folder
define("IMAGE_QUALITY", '90');


// ENUM for image folder name in AWS S3 and photo database
// will be converted in Core\Enum.php
define("IMAGE_SIZE_ORIGINAL", 1);
define("IMAGE_SIZE_LARGE", 2);
define("IMAGE_SIZE_MEDIUM", 3);
define("IMAGE_SIZE_SMALL", 4);
define("IMAGE_SIZE_THUMBNAIL", 5);
define("IMAGE_PROFILE_PICTURE", 6);
define("IMAGE_TEMPORARY_PICTURE", 7);
define("IMAGE_PITCH_COVER_PHOTO", 8);
define("IMAGE_PITCH_PROJECT_COVER_PHOTO", 9);
define("DOCUMENT", 10);

define("IMAGE_SIZE_LARGE_RESOLUTION", '3500 x 3500'); // Large px
define("IMAGE_SIZE_MEDIUM_RESOLUTION", '1500 x 1500'); // Medium px
define("IMAGE_SIZE_SMALL_RESOLUTION", '1000 x 1000'); // Small px

define("IMAGE_SIZE_SLIDER_RESOLUTION", '1380 x 750'); // Thumbnail px
define("IMAGE_SIZE_THUMBNAIL_SLIDER", '150 x 150');


// ini adalah parameter untuk check photo dan document size before uploading 
define("MAX_FILE_SIZE_TO_UPLOAD", 2000000); // 2 MB untuk Photo Upload


define("MIN_THUMB_SLIDE_SIZE_TO_UPLOAD", 5000); // 5 KB untuk Photo Thumb Slide
define("MIN_IMAGE_SLIDE_SIZE_TO_UPLOAD", 10000); // 100 KB untuk Photo Slide


define("MIN_PHOTO_SIZE_TO_UPLOAD", 10000); // 100 KB untuk Photo upload 
define("MIN_FILE_SIZE_TO_UPLOAD", 10000); // 10 KB untuk Document Upload

// Ini adalah pixel untuk Resize //
// Bukan untuk pengecekan //
define("IMAGE_SIZE_LARGE_WIDTH", 3500); // Large px
define("IMAGE_SIZE_LARGE_HEIGHT", 3500); // Large px

define("IMAGE_SIZE_MEDIUM_WIDTH", 1500); // Medium px
define("IMAGE_SIZE_MEDIUM_HEIGHT", 1500); // Medium px

define("IMAGE_SIZE_SMALL_WIDTH", 1000); // Small px
define("IMAGE_SIZE_SMALL_HEIGHT", 1000); // Small px

define("IMAGE_SIZE_SLIDER_WIDTH", 1380); // Thumbnail px
define("IMAGE_SIZE_SLIDER_HEIGHT", 750); // Thumbnail px

define("IMAGE_SIZE_THUMBNAIL_SLIDER_WIDTH", 150); // Thumbnail px
define("IMAGE_SIZE_THUMBNAIL_SLIDER_HEIGHT", 150); // Thumbnail px

define("IMAGE_HASH_MIDDLEWARE_SECRET", 'satwakita');
define("IMAGE_HASH_SIGNATURE", 'sha1');
define("IMAGE_HASH_SIGNATURE_DIGIT", '16');

// Path Optimizer
define("OPTIMIZER_PNG", '/usr/local/bin/pngquant');
define("OPTIMIZER_JPG_JPEG", '/usr/local/bin/jpegoptim');
define("OPTIMIZER_GIF", '/usr/local/bin/gifsicle');

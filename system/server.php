<?php
/**
 * @Author: Risdyanto Kurniawan
 * @Date:   2018-02-04 16:05:51
 * @Last Modified by:   risdyanto
 * @Last Modified time: 2016-12-14 17:40:49
 */

if (PHP_SAPI == 'cli-server') {
    // To help the built-in PHP dev server, check if the request was actually for
    // something which should probably be served as a static file
    $file = __DIR__ . $_SERVER['REQUEST_URI'];
    if (is_file($file)) {
        return false;
    }
}

require PATH_ROOT . 'vendor/autoload.php';
//session_start();

$dotenv = new Dotenv\Dotenv(PATH_ROOT);
$dotenv->load();

require PATH_ROOT . "system/constant/definition.php";

// Instantiate the app
$settings = require PATH_ROOT.'system/config/setting.php';
$app = new \Slim\App($settings);

// Set up dependencies
require PATH_ROOT.'system/dependency.php';

// Register middleware
require PATH_ROOT.'system/middleware.php';

// Register routes
require PATH_ROOT.'system/route.php';

// Register database
require PATH_ROOT.'system/config/database.php';

// Run app
$app->run();

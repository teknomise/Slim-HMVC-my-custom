<?php

/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */

// DIC configuration
$container = $app->getContainer();

//http cache
$container['cache'] = function () {
    return new \Slim\HttpCache\CacheProvider();
};

// view
$container['view'] = function ($c) {
    $settings = $c->get('settings')['view'];
    
    $view = new \Slim\Views\Twig($settings['template_path'], [
        'debug' => $settings['debug'],
        'cache' => $settings['cache_path'],
    ]);
    $loader = $view->getLoader();
    $loader->addPath($c->get('settings')['assets']['source'], 'public');

    $view->addExtension(new \Slim\Views\TwigExtension(
        $c['router'],
        $c['request']->getUri()
    ));

    $view->addExtension(new \Helpers\TwigFunction());
    $view->addExtension(new Twig_Extension_Debug());
    $view->addExtension(new \Odan\Twig\TwigAssetsExtension($view->getEnvironment(),  $c->get('settings')['assets']));

    return $view;
};

//Session
$container['session'] = function ($container) {
    return new \Adbar\Session(
        $container->get('settings')['session']['namespace']
    );
};

//CSRF
$container['csrf'] = function ($c) {
    return new \Adbar\Slim\Csrf(
        $c->get('session'),
        $c->get('view')
    );
};

// Flash messages
$container['flash'] = function ($c) {
    return new \Slim\Flash\Messages;
};

// Logger
$container['logger'] = function ($c) {  
    $settings = $c->get('settings')['logger'];
    $stream = new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG);
    $dateFormat = "Y-m-d H:i:s";
    $output = "[%datetime%] %channel% %level_name% %extra% -> %message% : %context%\n";
    $formatter = new Monolog\Formatter\LineFormatter($output, $dateFormat);
    $stream->setFormatter($formatter);
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\WebProcessor()); 
    $logger->pushHandler($stream);
    $logger->pushHandler(new Monolog\Handler\FirePHPHandler());
    $fingersCrossed = new Monolog\Handler\FingersCrossedHandler($stream, Monolog\Logger::ERROR);
    $logger->pushHandler($fingersCrossed);
    return $logger;
};

// error handle
$container['errorHandler'] = function ($c) {
    $env = getenv("ENV");
    if ($env != "production") {
        return new Dopesong\Slim\Error\Whoops($c->get('settings')['displayErrorDetails']);
    } else {
        return new Application\Errors\ErrorHandler($c['Logger'], $c->get('view'));
    }
};

//Override the default Not Found Handler
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {

        $_SESSION["last_url"] = $_SERVER["REQUEST_METHOD"] . " - " . $_SERVER["REQUEST_URI"];
        //return $c->get('response')->withRedirect('/sorry', 404);
        return new Application\Errors\ErrorHandler($c['Logger'], $c->get('view'));
    };
};

//Override the default Not Found Handler
$container['notAllowedHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        $_SESSION["last_url"] = $_SERVER["REQUEST_METHOD"] . " - " . $_SERVER["REQUEST_URI"];
        return new Application\Errors\ErrorHandler($c['Logger'], $c->get('view'));
        //return $c->get('response')->withRedirect('/sorry', 405);
    };
};





require PATH_ROOT.'system/dependency/core.php';
require PATH_ROOT.'system/dependency/model.php';
require PATH_ROOT.'system/dependency/service.php';
require PATH_ROOT.'system/dependency/controller.php';
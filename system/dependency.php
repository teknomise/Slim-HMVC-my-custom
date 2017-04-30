<?php

/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */
use Cartalyst\Sentinel\Native\Facades\Sentinel as Sentinel;

// DIC configuration
$container = $app->getContainer();

// Register component on container
$container['view'] = function ($c) {
    $settings = $c->get('settings')['view'];
    $view     = new \Slim\Views\Twig($settings['template_path'], [
        'debug' => $settings['debug'],
        'cache' => $settings['cache_path'],
    ]);
    $view->addExtension(new \Slim\Views\TwigExtension(
        $c['router'],
        $c['request']->getUri()
    ));
    $view->addExtension(new \Core\TwigFunction());
    return $view;
};


// Flash messages
$container['flash'] = function ($c) {
    return new \Slim\Flash\Messages;
};

$container['logger'] = function ($c) {  
    $settings = $c->get('settings')['logger'];
    $stream = new Monolog\Handler\StreamHandler($settings['path'], Monolog\Logger::DEBUG);
    $dateFormat = "Y-m-d H:i:s";
    $output = "[%datetime%] %channel% %level_name% %extra% -> %message% : %context%\n";
    $formatter = new Monolog\Formatter\LineFormatter($output, $dateFormat);
    $stream->setFormatter($formatter);

    $logger   = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\WebProcessor());
    //$logger->pushProcessor(new Monolog\Processor\IntrospectionProcessor());
    //$logger->pushProcessor(new Monolog\Processor\MemoryUsageProcessor());    
    $logger->pushHandler($stream);
    $logger->pushHandler(new Monolog\Handler\FirePHPHandler());
    return $logger;
};


// error handle
$container['errorHandler'] = function ($c) {
    $env = getenv("ENV");
    if ($env != "production") {
        return new Dopesong\Slim\Error\Whoops($c->get('settings')['displayErrorDetails']);
    } else {
        return function ($request, $response, $exception) use ($c) {
            $data = [
                'code'    => $exception->getCode(),
                'message' => $exception->getMessage(),
                'file'    => $exception->getFile(),
                'line'    => $exception->getLine(),
                'trace'   => explode("\n", $exception->getTraceAsString()),
            ];

            return $c->get('response')->withStatus(500)
                ->withHeader('Content-Type', 'text/html')
                ->write('Whoops, looks like something went wrong.');
        };
    }
};

//Override the default Not Found Handler
$container['notFoundHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        $_SESSION["last_url"] = $_SERVER["REQUEST_METHOD"] . " - " . $_SERVER["REQUEST_URI"];
        return $c->get('response')->withRedirect('/sorry', 404);
    };
};

//Override the default Not Found Handler
$container['notAllowedHandler'] = function ($c) {
    return function ($request, $response) use ($c) {
        $_SESSION["last_url"] = $_SERVER["REQUEST_METHOD"] . " - " . $_SERVER["REQUEST_URI"];
        return $c->get('response')->withRedirect('/sorry', 405);
    };
};

// Generate Activation Code
$container['activation'] = function ($c) {
    return new \Cartalyst\Sentinel\Activations\IlluminateActivationRepository;
};

// Generate Reminder Code
$container['reminder'] = function ($c) {
    return new \Cartalyst\Sentinel\Reminders\IlluminateReminderRepository(
        new \Cartalyst\Sentinel\Users\IlluminateUserRepository(Sentinel::getHasher())
    );
};


require PATH_ROOT.'system/dependency/core.php';
require PATH_ROOT.'system/dependency/model.php';
require PATH_ROOT.'system/dependency/service.php';
require PATH_ROOT.'system/dependency/controller.php';




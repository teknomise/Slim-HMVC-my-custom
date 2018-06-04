<?php
/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */
// Application middleware


$container = $app->getContainer();

$app->add(function ($request, $response, $next) {
    $response_without_header = $next($request, $response);
    return $response_without_header
        ->withHeader('Access-Control-Allow-Origin', getenv("HOST_SERVER"))
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST');
});

$app->add(function ($request, $response, $next) {
    $this->view->offsetSet('flash', $this->flash);
    return $next($request, $response);
});

$app->add(new \Slim\HttpCache\Cache('public', 86400));

/** Csrf */
//$app->add($container->get('csrf'));

/** Session */
$app->add(new \Adbar\SessionMiddleware($container->get('settings')['session']));

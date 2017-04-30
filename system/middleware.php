<?php
/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */
// Application middleware
use Slim\Middleware\JwtAuthentication\RequestMethodRule;
use Slim\Middleware\JwtAuthentication\RequestPathRule;

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

$app->add(new \Slim\Middleware\JwtAuthentication([
    "secure"   => false,
    "relaxed"  => ["localhost"],
    "secret"   => getenv("JWT_SECRET"),
    "callback" => function ($request, $response, $arguments) use ($container) {
        $container["jwt"] = $arguments["decoded"];
    },
    "rules"    => [
        new RequestPathRule([
            "path"        => [""], // APPLY TO ALL ROUTE!
            "passthrough" => [
                "/api/v1/login",
                "/dashboard",
                "/web-admin",
                "/api/v1/admin/editslides",
                "/api/v1/admin/uploadimages",
                "/api/v1/admin/upload-satwa-images"
            ],
            // EXCEPTION ROUTE WITHOUT AUTH
        ]),
        new \Slim\Middleware\JwtAuthentication\RequestMethodRule([
            "passthrough" => ["GET", "OPTIONS"], // EXCEPTION METHOD WITHOUT AUTH
        ]),
    ],
    "error"    => function ($request, $response, $arguments) use ($app) {
        return $response->write(json_encode(["status" => 404, "messages" => "JWT Token Authentication Failed."]));
    },
]));

<?php

/**
 * @Author: Risdyanto Kurniawan
 * @Date:   7 Mei 2018
 * @Last Modified by:   
 * @Last Modified time: 
 */

/*
Routes
controller needs to be registered in dependency.php
*/

// API ROUTES - RETURN JSON OUTPUT
// $app->group('/api/v1', function () use ($app) {

//   $app->group('/tokenize', function () {
//         $this->get('[/]', 'Controller\Tokenize:generateToken')->setName('generateToken');
//         $this->get('/{id:[0-9]+}', 'Controller\Home:getUser');
//     });

//     $app->group('/user', function () {
//         $this->get('[/]', 'Controller\User:all');
//         $this->get('/{id:[0-9]+}', 'Controller\User:find');
//         $this->post('/{id:[0-9]+}/update', 'Controller\User:update');
//         $this->post('/{id:[0-9]+}/delete', 'Controller\User:delete');
//     });

//     $app->post('/login', 'Controller\User:login');
// });



// SERVER SIDE RENDERING ROUTES - RETURN HTML
$app->get('/', 'Application\Modules\Motor\Home:dispatch');

$app->group('/detail-motor', function () {
    $this->get('/', 'Application\Modules\Motor\Detail:dispatch');
    $this->get('/{slug:[a-zA-Z0-9\-]+}', 'Application\Modules\Motor\Detail:getBySlug');
});



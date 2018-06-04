<?php

/**
 * @Author: Risdyanto Kurniawan
 * @Date:   7 Mei 2018
 * @Last Modified by:   
 * @Last Modified time: 23 Mei 2018
 */

 // AJAX API ROUTES - RETURN JSON OUTPUT

$app->group('/ajax', function () use ($app) {
    $container = $app->getContainer();
    // $app->group('/tokenize', function () {
    //     $this->get('[/]', 'Controller\Tokenize:generateToken')->setName('generateToken');
    //     $this->get('/{id:[0-9]+}', 'Controller\Home:getUser');
    // });

    // $app->group('/user', function () {
    //     $this->get('[/]', 'Controller\User:all');
    //     $this->get('/{id:[0-9]+}', 'Controller\User:find');
    //     $this->post('/{id:[0-9]+}/update', 'Controller\User:update');
    //     $this->post('/{id:[0-9]+}/delete', 'Controller\User:delete');
    // });

    // $app->post('/login', 'Controller\User:login');

    $app->post('/get-merek-baru', 'Application\Modules\General\Site:get_merek_baru');//->add($container->get('csrf'));
    $app->post('/get-list-mobil-baru', 'Application\Modules\General\Site:get_list_mobil_baru');//->add($container->get('csrf'));
});

$app->get('/sorry', 'Application\Errors:not_found');







<?php

/**
 * @Author: risdyanto kurniawan
 * @Date:   2016-03-21 15:53:24
 * @Last Modified by:   mg5
 * @Last Modified time: 2016-12-13 18:28:46
 */

/*
Routes
controller needs to be registered in dependency.php
*/

// API ROUTES - RETURN JSON OUTPUT
$app->group('/api/v1', function () use ($app) {

  $app->group('/tokenize', function () {
        $this->get('[/]', 'Controller\Tokenize:generateToken')->setName('generateToken');
        $this->get('/{id:[0-9]+}', 'Controller\Home:getUser');
    });

    $app->group('/user', function () {
        $this->get('[/]', 'Controller\User:all');
        $this->get('/{id:[0-9]+}', 'Controller\User:find');
        $this->post('/{id:[0-9]+}/update', 'Controller\User:update');
        $this->post('/{id:[0-9]+}/delete', 'Controller\User:delete');
    });

    $app->post('/login', 'Controller\User:login');

    $app->group('/admin', function() {
        $this->post('/editslides/{id:[0-9]+}', 'Controller\Slider:editslides');
        $this->post('/uploadimages/{id:[0-9]+}/{tipe:[0-9]+}', 'Controller\Uploader:image_uploader');
        $this->post('/upload-satwa-images/{id:[0-9]+}/{tipe:[0-9]+}/{slug:[a-zA-Z0-9\-]+}', 'Controller\Uploader:image_uploader');
        $this->post('/update_destinasi/{id:[0-9]+}', 'Controller\Destinasi:update_destinasi');
        $this->post('/kategori_edit/{id:[0-9]+}', 'Controller\Satwa:edit_kategori');
        $this->post('/kategori_new', 'Controller\Satwa:create_kategori');
        $this->post('/getimagesgallery', 'Controller\Satwa:get_images_gallery');
        $this->post('/edit-satwa/{id:[0-9]}', 'Controller\Satwa:edit_satwa');
        $this->post('/add-satwa', 'Controller\Satwa:add_satwa');
        $this->post('/delete-satwa/{id:[0-9]+}', 'Controller\Satwa:delete_satwa');

    });
});

////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////// END OF API ROUTING //////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////

$app->get('/sorry', 'Application\Home\Controller\Home:sorry');
// SERVER SIDE RENDERING ROUTES - RETURN HTML
$app->get('/', 'Application\Home\Controller\Home:dispatch');

// $app->group('/destinasi', function () {
//     $this->get('/', 'Controller\Home:destinasi');
//      $this->get('/{slug:[a-zA-Z0-9\-]+}', 'Controller\Home:destinasi_dispatch_slug');
// });



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





// SERVER SIDE RENDERING ROUTES - RETURN HTML
$app->get('/', 'Application\Modules\Motor\Home:dispatch');

$app->group('/detail-motor', function () {
    $this->get('/', 'Application\Modules\Motor\Detail:dispatch');
    $this->get('/{slug:[a-zA-Z0-9\-]+}', 'Application\Modules\Motor\Detail:getBySlug');
});


$app->post('/cari-motor-baru', 'Application\Modules\Motor\Home:cariMotorBaru');



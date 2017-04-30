<?php

/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat, 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */

$container = $app->getContainer();

$container['Core\Mailer'] = function ($c) {
    return new Core\Mailer(
        $c->get('view')
    );
};

$container['Core\JWTHelper'] = function ($c) {
    return new Core\JWTHelper;
};

$container['Core\AuthHelper'] = function ($c) {
	return new Core\AuthHelper;
};

$container['Core\BaseController'] = function($c){
	return new Core\BaseController;
};

$container['Core\BaseService'] = function($c){
	return new Core\BaseService;
};


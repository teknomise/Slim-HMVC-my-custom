<?php

/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat, 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */
// DIC configuration
$container = $app->getContainer();

// 1) HOMEPAGE SERVICE
$container['Service\Homepage'] = function ($c) {
    return new Service\Homepage(
        $c->get('Model\Sqlstatement')
    );
};

// 2) TOKEN JWT SERVICE
$container['Service\Token'] = function ($c) {
    return new Service\Token(
        $c->get('Core\JWTHelper')
    );
};




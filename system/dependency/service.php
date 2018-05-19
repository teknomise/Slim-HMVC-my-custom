<?php

// DIC configuration
$container = $app->getContainer();

// 1) HOMEPAGE SERVICE
$container['Application\Frontend\Service\HomeService'] = function ($c) {
    return new Application\Frontend\Service\HomeService(
        $c->get('Model\Sqlstatement')
    );
};

// 2) TOKEN JWT SERVICE
$container['Service\Token'] = function ($c) {
    return new Service\Token(
        $c->get('Core\JWTHelper')
    );
};




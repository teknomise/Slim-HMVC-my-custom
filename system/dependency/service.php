<?php

// DIC configuration
$container = $app->getContainer();

// 1) HOMEPAGE SERVICE
$container['Application\Modules\Motor\Home'] = function ($c) {
    return new Application\Module\Motor\Home\Service;
};





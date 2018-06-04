<?php

/**
 * @Author: Risdyanto Kurniawan
 * @Date:   7 Mei  2018
 * @Last Modified by:   
 * @Last Modified time: 
 */

// DIC configuration
$container = $app->getContainer();

// 1) MOTOR HOME CONTROLLER
$container['Application\Modules\Motor\Home'] = function ($c) {
    return new \Application\Modules\Motor\Home\Controller(
        $c->get('view')
    );
};

$container['Application\Modules\Motor\Detail'] = function ($c) {
    return new \Application\Modules\Motor\Detail\Controller(
        $c->get('view')
    );
};

$container['Application\Modules\General\Site'] = function($c) {
    return new \Application\Modules\General\Site\SiteController(
        $c->get('view')
    );
};





// ERROR PAGES
$container['Application\Errors'] = function ($c) {
    return new \Application\Errors\ErrorController(
        $c->get('view')
    );
};


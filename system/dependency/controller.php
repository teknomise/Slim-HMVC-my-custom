<?php

/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */

// DIC configuration
$container = $app->getContainer();

// 1) HOME CONTROLLER
$container['Application\Home\Controller\Home'] = function ($c) {
    return new \Application\Home\Controller\Home(
        $c->get('view')
    );
};


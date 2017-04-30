<?php

/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat, 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */
// DIC configuration
$container = $app->getContainer();

$container['Model\Dummy'] = function ($c) {
    return new Model\Dummy;
};


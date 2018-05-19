<?php

/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat, 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */

$container = $app->getContainer();

$container['Helpers\EHelper'] = function ($c) {
	return new Helpers\AuthHelper;
};

$container['Helpers\BaseController'] = function($c){
	return new Helpers\BaseController;
};

$container['Helpers\BaseService'] = function($c){
	return new Helpers\BaseService;
};



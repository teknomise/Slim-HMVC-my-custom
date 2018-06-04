<?php
  /**
 * @Author: Risdyanto Kurniawan
 * @Date:   7 Mei 2018
 * @Last Modified by:   risdyanto
 * @Last Modified time: 
 */

namespace Application\Modules\Motor\Home;

use Helpers\Assets;
use Helpers\EHelper as Lib;
use Helpers\BaseController as Base;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Application\Modules\Motor\Home\Service ;

class Controller 
{
    protected $view;
    protected $service;
    protected $data_render;
 
    /* ------------------------------------------------------------------------
    * Main Constructor
    * @param service :  to do backend work
    * @param data_render : to define global param (header_sales & controller)
    * Set by : Risdyanto Kurniawan
    --------------------------------------------------------------------------*/
    public function __construct($view)
    { 
        $this->view = $view;    
        $this->service = New Service;
        $this->data_render = [
            "show_header" => true,
            "show_footer" => true,
            "controller" => MOTOR_HOME_CONTROLLER,
            "css_assets" => Assets::css([
                "ramo-home.css",
            ]),
            "js_assets" => Assets::js([
                "ramo-home.js"
            ]),
        ];
    }


    /* ------------------------------------------------------------------ 
    * Home Controller Motor
    * All data will be served by Application\Modules\Motor\Home\Service
    * set by : Risdyanto Kurniawan
    *-------------------------------------------------------------------*/
    public function dispatch(Request $request, Response $response, $args)
    {
        // $this->data_render["assets"] = ['@public/assets/css/main-framework.css', '@public/assets/css/main-style.css'];

        $this->data_render["meta"] = $this->service->getSeo();
        $this->data_render["home"] = $this->service->getMotorHome();
        $this->data_render['type'] = "motor";
        
        $this->view->render($response, MOTOR_HOME_THEME, $this->data_render);
        return $response;
    }

   
}

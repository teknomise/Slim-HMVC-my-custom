<?php
  /**
 * @Author: Risdyanto Kurniawan
 * @Date:   23 Mei 2018
 * @Last Modified by:   risdyanto
 * @Last Modified time: 
 */

namespace Application\Modules\General\Site;

use Helpers\Assets;
use Helpers\EHelper as Lib;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Application\Modules\General\Site\SiteService as Service ;

class SiteController 
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
     
    }

    /* ------------------------------------------------------------------ 
    * Search from Ajax Get Merek Baru
    * Get parameter from Argument => $args
    * set by : Risdyanto Kurniawan
    *-------------------------------------------------------------------*/
    public function get_merek_baru(Request $request, Response $response) : Response
    {
        $req = (object)$request->getParsedBody();
     
        $res = ($req->kategori === 'motor') ? $this->service->get_merek_motor() : $this->service->get_merek_mobil();
        
        return $response->withJson($res['data'], 200);
    }

    /* ------------------------------------------------------------------ 
    * Search from Ajax Get Merek Bekas
    * Get parameter from Argument => $args
    * set by : Risdyanto Kurniawan
    *-------------------------------------------------------------------*/

    public function get_merek_bekas(Request $request, Response $response) : Response
    {  
       return [];
    }

    /* ------------------------------------------------------------------ 
    * Search from Ajax List Mobil Baru
    * Get parameter from Argument => $args
    * set by : Risdyanto Kurniawan
    *-------------------------------------------------------------------*/

    public function get_list_mobil_baru(Request $request, Response $response)
    {
        $req = (object)$request->getParsedBody();
       
        $res = $this->service->get_list_mobil_baru($req);
        var_dump($res);die;
        return $response->withJson($res['data'], 200);
    }

     /* ------------------------------------------------------------------ 
    * Search from Ajax List Motor Baru
    * Get parameter from Argument => $args
    * set by : Risdyanto Kurniawan
    *-------------------------------------------------------------------*/

    public function get_list_motor_baru(Request $request, Response $response)
    {
       return [];
    }


   
}

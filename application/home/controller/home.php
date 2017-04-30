<?php
/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */
namespace Application\Home\Controller;

use Core\BaseController as Base;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class Home
{
    protected $view;
    //protected $service;
   
    public function __construct($view)
    {
        $this->view = $view;
        //$this->service = $service;        
    }

    public function dispatch(Request $request, Response $response, $args)
    {
        $twig_file = "home/view/home.twig";
      
        $data = array("title"=>"SatwaKita - Warisan Satwa Dunia");
   
        $this->view->render($response, $twig_file, $data);
        return $response;
    }
}

<?php
  /**
 * @Author: Risdyanto Kurniawan
 * @Date:   7 Mei 2018
 * @Last Modified by:   risdyanto
 * @Last Modified time: 
 */

namespace Application\Modules\Motor\Home;

use Helpers\BaseController as Base;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Application\Modules\Motor\Home\Service ;

final class Controller
{
    protected $view;
   
    public function __construct($view)
    { 
        $this->view = $view;    
    }

    public function dispatch(Request $request, Response $response, $args)
    {
        
        $data = [
            "header_sales" => true,
            "meta" => Service::getSeo()
        ];
   
        $this->view->render($response, MOTOR_HOME_THEME, $data);
        return $response;
    }

   

}

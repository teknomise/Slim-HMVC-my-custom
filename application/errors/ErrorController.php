<?php
  /**
 * @Author: Risdyanto Kurniawan
 * @Date:   7 Mei 2018
 * @Last Modified by:   risdyanto
 * @Last Modified time: 
 */

namespace Application\Errors;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class ErrorController
{
    protected $view;
   
    public function __construct($view)
    { 
        $this->view = $view;    
    }

    public function not_found(Request $request, Response $response, $args)
    {
        
        $data = [
            "header_sales" => true,

        ];
   
        $this->view->render($response, ERROR_400THEME, $data);
        return $response;
    }

   

}

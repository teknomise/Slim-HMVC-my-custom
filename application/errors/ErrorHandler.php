<?php
  /**
 * @Author: Risdyanto Kurniawan
 * @Date:   18 Mei 2018
 * @Last Modified by:   risdyanto
 * @Last Modified time: 
 */

namespace Application\Errors;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Monolog\Logger;
 
final class ErrorHandler extends \Slim\Handlers\Error
{
    protected $logger, $view;
 
    public function __construct(Logger $logger, View $view)
    {
        $this->logger = $logger;
        $this->view = $view;
    }
 
    public function __invoke(Request $request, Response $response, \Exception $exception)
    {
        // Log the message
        $this->logger->critical($exception->getMessage());
 
        // create a JSON error string for the Response body

        $body = json_encode([
            'error' => $exception->getMessage(),
            'code' => $exception->getCode(),
            'file'    => $exception->getFile(),
            'line'    => $exception->getLine(),
            'trace'   => explode("\n", $exception->getTraceAsString())
        ], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        
        $this->view->render($response, ERROR_500THEME, $body);
        return $response
                ->withStatus(500)
                ->withHeader('Content-type', 'application/json')
                ->withBody(new Body(fopen('php://temp', 'r+')))
                ->write($body);
    }
}


?>
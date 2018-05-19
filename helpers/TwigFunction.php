<?php
  /**
 * @Author: Risdyanto Kurniawan
 * @Date:   2018-03-07 13:05:51
 * @Last Modified by:   risdyanto
 * @Last Modified time: 
 */
namespace Helpers;

class TwigFunction extends \Twig_Extension
{
 
    public function __construct()
    {      
    }

    public function getName()
    {
        return 'slim-twig-helper';
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('dummyFunction', array($this, 'dummyFunction')),
            new \Twig_SimpleFunction('isProduction', array($this, 'isProduction')),
          
        ];
    }

    public function dummyFunction()
    {
        $result = true;
        return $result;
    }

    public function isProduction(){
        $result = false;
        if ((getenv("ENV") == "production")) {
            $result = true;
        } 
        return $result;
    }

   
}
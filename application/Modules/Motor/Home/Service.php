<?php

  /**
 * @Author: Risdyanto Kurniawan
 * @Date:   7 Mei 2018
 * @Last Modified by:   risdyanto
 * @Last Modified time: 
 */

namespace Application\Modules\Motor\Home;

use Helpers\BaseService as Base;
use Application\General\Service\Seo ;

class Service
{

    public static function getSeo()
    {
        return [
            "seo" => Seo::home()
        ];
    }
   

    
}

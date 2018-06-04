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

    public function __construct()
    {   
    }

    public function getSeo()
    {
        return [
            "seo" => Seo::home()
        ];
    }

    /* -----------------------------------------------------------
    * Service to get All data for Motor Home
    * AWS Lambda Funtion : "motor-get-home"
    * set by : Risdyanto Kurniawan
    *------------------------------------------------------------*/
    public function getMotorHome()
    {
        $result = Base::apiAction(
            "POST", 'motor/get-home', ""
        ); 

        $newdata = Base::get_json_data_mobile_home(1)['list_mobil']['terpopuler'];



        if($result->status === STATUS_CODE_SUCCESS){
            return [
                "banner" => $this->getHomeBanner($result->data['banner'])
            ];
        } else {
            return [];
        }
    }

    /* ----------------------------------------------------------
    * Get Home Banner Slides
    * format apiAction variable : $type, $function_url, $postdata
    * Server Side Rendering Template
    * Set by: Risdyanto Kurniawan
    *------------------------------------------------------------*/
    private function getHomeBanner($data)
    {
        if (!empty($data)) :
            $layout = '<div class="billboard-home">
                        <ul class="wrapper-billboard-home-list">';
                foreach ($data as $index => $img) : $img = (object) $img;
                    $image_url = IMAGE_CDN_RESIZE.IMG_HOME_BANNER.$img->desktop;
                    $layout .= '<li class="'.($index == 0 ? "active" : "").'">';
                    $layout .= '<a class="gaevent" href="'.$img->url.'" data-galabel="'.$img->name.'" data-gakategori="Homepage" data-gaaction="Click-Banner-Motor-Homepage" target="_blank">
                                    <img class="img-responsive" src="'.$image_url.'" alt="'.$img->name.'" title="'.$img->name.'" >
                                </a>';
                    $layout .= '</li>';
                endforeach;
            $layout .= '</ul></div>';
        endif;
        
        return $layout;
       
    }
   

    
}

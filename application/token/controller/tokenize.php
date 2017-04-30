<?php
/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat, 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */

namespace Controller;

use Core\BaseController as Base;

final class Tokenize extends BaseController
{
    private $service;

    public function __construct($service)
    {
        $this->service = $service;
    }
    
    public function generateToken(){


      $result = array("status"=>false, "message"=>"", "jwt"=>null);
    
      
      //$ar_login_user = Base::isLogin_User();
       $ar_login_user = $this->service->isLogin();

      if($ar_login_user){
        $profile_id = $ar_login_user["login_profile_id"];
        if($profile_id && ($profile_id > 0)){
          $jwt = $this->service->generateToken($profile_id);
          $result["status"] = true;
          $result["message"] = "success";
          $result["profile_id"] = $profile_id;
          $result["jwt"] = $jwt;
        } else {
          $result["message"] = "Invalid profile_id from login information: " . $profile_id;
        }
      } else {
        $result["message"] = "Please Login First to be able to generate token.";
      }

      return json_encode($result);
    }
}

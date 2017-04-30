<?php
/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat, 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */
namespace Service;

use Service\BaseService as Base;
use Service\Login as Login;


final class Token
{
  protected $jwt_helper;

  public function __construct($jwt_helper)
  {
    $this->jwt_helper = $jwt_helper;
  }

  public function generateToken($id){
    $result = $this->jwt_helper->generateToken($id);
    return $result;
  }

  public function getUser($id){
    $sql = "select * from users where id=:PARAM_id";
    $binding_ar = array("PARAM_id"=>$id);
    $sql_result = Base::select($sql, $binding_ar, MASTER_DB_NAME);
    return $sql_result;
  }

  public static function isLogin(){
        return Login::getLogin_User();
    }
}

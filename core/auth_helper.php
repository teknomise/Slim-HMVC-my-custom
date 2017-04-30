<?php

/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat, 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */

namespace Core;

use Illuminate\Database\QueryException as QueryException;
use Core\BaseService as BaseService;
use Cartalyst\Sentinel\Native\Facades\Sentinel as Sentinel;

final class AuthHelper
{
	public static function authenticate($credential){

        $status_code = STATUS_CODE_UNAUTHORIZED;
        $message = "";
        $data = null;

        $ar_login_user = self::getLogin_User();

        if ($ar_login_user && !empty($ar_login_user)) {
            $status_code = STATUS_CODE_SUCCESS;
            $message .= "This session is already logged in. Please log out first. ";
        } else {
            try {
                $login_status = Sentinel::authenticate($credential);
               
                if ($login_status && $login_status !== false) {
                    $message .= "Succesfully login. ";
                    $status_code = STATUS_CODE_SUCCESS;
                } else {
                    $message .= "Invalid user or password. Failed to login. ";
                }
            } catch (NotActivatedException $e) {
                $message .= "Account is not yet activated!";
            } catch (ThrottlingException $e) {
                $delay = $e->getDelay();
                $message .= "Your account is blocked for {$delay} second(s). Please try again later. ";
            }
        }

        $result = array("status_code"=>$status_code, "message"=>$message, "data"=>$data);
        return $result;
    }

    public static function AuthTokenWithLogin($jwt){
        $status_code = STATUS_CODE_UNAUTHORIZED;
        $message = "";
        $data = null;
        $login_id = NULL;

        $ar_login_user  = self::getLogin_User();
        if ($ar_login_user) {
            $login_id = $ar_login_user['login_profile_id'];
            if ($login_id && $login_id > 0) {
                if ($jwt) {
                    try{
                        $profile_id_from_jwt = $jwt->data->profile_id;
                        if ($profile_id_from_jwt && $profile_id_from_jwt > 0) {
                            if ($login_id == $profile_id_from_jwt) {
                                $status_code = STATUS_CODE_SUCCESS;
                                $message .= "Success. Matched!";
                                $data = $ar_login_user;
                            } else {
                                $message .= "Mismatch between jwt token profile id and user login id";
                            }
                        } else {
                            $message .= "Valid User logged in but has invalid jwt data payload";
                        }
                    } catch (Exception $e) {
                        $message .= "Exception error during AuthTokenWithLogin. ";
                    }
                } else {
                    $message .= "Valid User logged in but has empty JWT";
                }
            } else {
                $message .= "User has logged in but has invalid Login ID";
            }
        } else {
            $message .= "Please Login First.";
        }

        $result = array("status_code"=>$status_code, "message"=>$message, "data"=>$data, "profile_id"=>$login_id);
        return $result;
    }

    public static function getLoginUserID(){
        $login_user_id = null;
        // Find current logged in User ID
        // From TESTING POSTMAN, FACEBOOK LOGIN, LOCAL
        $testing_on_postman = intval(getenv("ENV_TEST_POSTMAN")); 
        if ($testing_on_postman == 1) {
            $login_user_id = getenv("ENV_TEST_USER_ID");
        } else {
            $sentinel_login = Sentinel::check();
            if ($sentinel_login) {
                $sentinel_user = Sentinel::getUser();
                $login_user_id = intval($sentinel_user['id']);
            } else {
                $fb_login = isset($_SESSION['fb_access_token']);
                if ($fb_login) {
                    if (isset($_SESSION['login_user_id'])) {
                        $login_user_id = intval($_SESSION['login_user_id']);
                    }  
                    else {
                        self::logout();
                    }
                }
            }
        }
        return $login_user_id;
    }

    public static function getLoginUserInfo_AR($login_user_id){
        $ar_user = null;
        $super_user_flag = false;
        $db_name = MASTER_DB_NAME; // use default database

        if($login_user_id && !empty($login_user_id)){
            $populate_user_info = "select a.id as login_user_id, a.email as login_email, a.profile_id as login_profile_id, c.profile_type, c.tester_flag, c.slug as login_profile_slug, c.name as login_profile_name from users a LEFT JOIN profiles c ON a.profile_id = c.id where a.id=:PARAM_USER_ID and a.status=1";
            $binding_ar = array("PARAM_USER_ID"=>intval($login_user_id));
            $user_found = BaseService::select($populate_user_info, $binding_ar, $db_name)["data"];
            $ar_user = $user_found ? get_object_vars($user_found[0]) : NULL;
            if($ar_user){
                if($ar_user["role_id"] && ($ar_user["role_id"] == 1)){
                    $super_user_flag = true;
                }
                $ar_user["login_super_user"] = $super_user_flag;
            }
        }
        return $ar_user;
    }

    public static function getLogin_User(){

        $status_code = STATUS_CODE_FAIL;
        $message = "";
        $data = null;

        $login_data = null;
        $login_user_id = self::getLoginUserID();
        
        if($login_user_id && !empty($login_user_id)){
            
            if (isset($_SESSION['ar_login_user'])) {
                $data_from_session = $_SESSION['ar_login_user'];
                $existing_session_user_id = $data_from_session["login_user_id"];
                if($existing_session_user_id && ($existing_session_user_id == $login_user_id)){
                    // ONLY USE SESSION DATA WHEN LOGGED IN USER ID = SESSION USER ID.
                    $login_data = $data_from_session;
                } else {
                    // LOGGED IN USER IS DIFFERENT WITH SESSION USER ID.
                    // CHANGE USER
                    unset($_SESSION['ar_login_user']);
                }
            } 
        }

        if($login_data && !empty($login_data)){
            $status_code = STATUS_CODE_SUCCESS;
            $message = "restored from session.";
            $data = $login_data;
        } else {
            $ar_user = self::getLoginUserInfo_AR($login_user_id);
            if($ar_user){
                $data = $ar_user;
                $_SESSION['ar_login_user'] = $ar_user;   
            }
        }

        $result = $data;
        return $result;
    }

    public static function logout(){
        // Destroy all sessions for the current logged in users
        Sentinel::logout(null, true);
        if (isset($_SESSION['ar_login_user'])) {
            unset($_SESSION['ar_login_user']);
        }
        if (isset($_SESSION['login_user_id'])){
            unset($_SESSION['login_user_id']);
        }

        $result = true;
        return $result;
    }
}
<?php
/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat, 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */

namespace Core;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\QueryException as QueryException;
use \Exception;

class BaseService
{
    
    public static function removeSpecialCharExceptDash($str)
    {
        $pattern = array("/\s+/", "/[^a-zA-Z0-9-]/", "/-+/");
        $replace = array("-", "", "-");
        $new_str = preg_replace($pattern, $replace, $str);
        return $new_str;
    }

    public static function removeSpecialChar($str)
    {
        $pattern = array("/\s+/", "/[^a-zA-Z0-9]/");
        $replace = array("", "");
        $new_str = preg_replace($pattern, $replace, $str);
        return $new_str;
    }

    public static function regexPatternFromKeyword($keyword) 
    {
        $pattern      = array("/[^\w\d]+/");
        $replace      = array("");
        if (!empty($keyword)) {
            $keyword_filtered = preg_replace($pattern, $replace, $keyword);    
        }
        return $keyword_filtered;
    }

    public static function mysql_escape($inp)
    { 
        if(is_array($inp)) return array_map(__METHOD__, $inp);

        if(!empty($inp) && is_string($inp)) { 
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp); 
        } 

        return $inp; 
    }

    public static function anti_injection($input)
    {
        $clean  =   strip_tags(addslashes(trim($input)));
        $clean  =   str_replace('"','\"',$clean);
        $clean  =   str_replace(';','\;',$clean);
        $clean  =   str_replace('--','\--',$clean);
        $clean  =   str_replace('+','\+',$clean);
        $clean  =   str_replace('(','\(',$clean);
        $clean  =   str_replace(')','\)',$clean);
        $clean  =   str_replace('=','\=',$clean);
        $clean  =   str_replace('>','\>',$clean);
        $clean  =   str_replace('<','\<',$clean);

        return  self::mysql_escape(stripslashes(strip_tags(htmlspecialchars($clean, ENT_QUOTES ))));
    }

    public static function select_raw($sql, $binding, $db_name=NULL)
    {
        return self::execute_raw(SQL_SELECT, $sql, $binding, $db_name);
    }
  
    public static function update_raw($sql, $binding, $db_name=NULL)
    {
        return self::execute_raw(SQL_UPDATE, $sql, $binding, $db_name);
    }

    public static function select_one($model, $id)
    {
        $status_code = STATUS_CODE_FAIL;
        $message = "";
        $data = null;
        if($model && $id && !empty($model) && !empty($id)){
            try{
                $data = $model->find($id);

                $status_code = STATUS_CODE_SUCCESS;
            } catch (QueryException $e) {
                $message .= "Querry error. ";
            }
        } else {
            $message .= "Please provide valid model and valid id to find. ";
        }

        $result = array("status_code"=>$status_code, "message"=>$message, "data"=>$data);
        return $result;
    }

    protected static function execute_raw($command, $sql, $binding, $db_name=NULL)
    {
        $status_code = STATUS_CODE_FAIL;
        $message = "";
        $data = null;

        $connection = null;
        $binding_array = array();

        if($binding && !empty($binding)){
            $binding_array = $binding;
        }

        try{
            if($db_name && !empty($db_name)){   
                $connection = Capsule::connection($db_name);
            } else {
                $connection = Capsule::connection(); // default database
            }
        } catch (Exception $e) {
            $message .= "Invalid database name ($db_name). Fail to execute sql RAW. Please make sure the database is properly set. ";
        }
        
        if($connection && !empty($connection)){
            try{
                switch($command){
                    case SQL_SELECT:
                        $data = $connection->select($sql, $binding_array);
                        $message .= "successfully select raw sql. ";
                        $status_code = STATUS_CODE_SUCCESS;
                        break; 
                    case SQL_UPDATE:
                        $data = $connection->update($sql, $binding_array);
                        $message .= "successfully update raw sql. ";
                        $status_code = STATUS_CODE_SUCCESS;
                        break;
                    default:
                        $message .= "Unknown SQL command ($command). Fail to execute raw SQL. ";
                        break;
                }   

            } catch (\Illuminate\Database\QueryException $e) {
                echo $e->getMessage();
                $message .= "Query Exception: Fail to execute SQL Query execute_raw. ";
            } catch (PDOException $e) {
                $message .= "PDO exception: Fail to execute SQL Query execute_raw. ";
            } catch (MySQLException $e) {
                $message .= "MySQL exception: Fail to execute SQL Query execute_raw. ";
            } catch (Exception $e) {
                echo $e->getMessage();
                $message .= "PHP exception: Fail to execute SQL Query to execute_raw, ";
            }
        }

        $result = array("status_code" => $status_code, "message" => $message, "data" => $data);
        return $result;
    }

    public static function delete($model, $id) 
    {
        return self::delete_data(SQL_DELETE, $model, $id);
    }

    protected static function delete_data($command, $model, $id) 
    {
        $status_code = STATUS_CODE_FAIL;
        $message = "";
        $data = null;

        if($model && !empty($model) && $command && !empty($command) && $id && !empty($id)){
            try{
                $m = $model->find($id);                
                if($m){
                    switch($command){
                        case SQL_DELETE:
                            $m->delete();
                            $message .= "successfully deleted (id=$id). ";
                            $status_code = STATUS_CODE_SUCCESS;
                            break;
                        default:
                            $message .= "Unknown SQL command ($command). Fail to execute SQL. ";
                            break;
                    }      
                } else {
                    $message .= "Sorry, we couldn't find a valid instance of model with (id=$id). ";
                }
            } catch (\Illuminate\Database\QueryException $e) {
                echo $e->getMessage();
                $message .= "Query Exception: Fail to execute SQL Query execute ";
            } catch (PDOException $e) {
                $message .= "PDO exception: Fail to execute SQL Query execute ";
            } catch (MySQLException $e) {
                $message .= "MySQL exception: Fail to execute SQL Query execute ";
            } catch (Exception $e) {
                echo $e->getMessage();
                $message .= "PHP exception: Fail to execute SQL Query to execute ";
            }
        } else {
            $message .= "Please input valid SQL Command, Model, and id. ";
        }

        $result = array("status_code" => $status_code, "message" => $message, "data" => $data);
        return $result;
    }

    public static function execute_select_raw_sql($raw_sql, $binding_array=null) 
    {

        $status_code = STATUS_CODE_FAIL;
        $message = "";
        $data = null;

        try{
            if($binding_array && !empty($binding_array)){
                $data = Capsule::select($raw_sql, $binding_array);            
            } else {
                $data = Capsule::select($raw_sql);            
            }
            $message = "success select sql.";
            $status_code = STATUS_CODE_SUCCESS;
        } catch (\Illuminate\Database\QueryException $e) {
            echo $e->getMessage();
            $message .= "Query Exception: Fail to execute SQL Query execute_select_raw_sql. ";
        } catch (PDOException $e) {
            $message .= "PDO exception: Fail to execute SQL Query execute_select_raw_sql. ";
        } catch (MySQLException $e) {
            $message .= "MySQL exception: Fail to execute SQL Query execute_select_raw_sql. ";
        } catch (Exception $e) {
            $message .= "PHP exception: Fail to execute SQL Query to execute_select_raw_sql, ";
        }

        $result = array("status_code" => $status_code, "message" => $message, "data" => $data);
        return $result;
    }

    public static function execute_update_raw_sql($raw_sql, $binding_array=null)
    {
       
        $status_code = STATUS_CODE_FAIL;
        $message = $raw_sql;
        $data = null;

        try{
            if($binding_array && !empty($binding_array)){
                $data = Capsule::update($raw_sql, $binding_array);            
            } else {
                $data = Capsule::update($raw_sql);            
            }            
            $message = "success update sql.";
            $status_code = STATUS_CODE_SUCCESS;
        } catch (\Illuminate\Database\QueryException $e) {
            $message .= "Query Exception: Fail to execute SQL Query to find matching entries with these tags. ";
        } catch (PDOException $e) {
            $message .= "PDO exception: Fail to execute SQL Query to find matching entries with these tags. ";
        } catch (MySQLException $e) {
            $message .= "MySQL exception: Fail to execute SQL Query to find matching entries with these tags. ";
        } catch (Exception $e) {
            $message .= "PHP exception: Fail to execute SQL Query to find matching entries with these tags. ";
        }

        $result = array("status_code" => $status_code, "message" => $message, "data" => $data);
        return $result;
    }

    public static function finalize_data($data, $result)
    {
        if ($data && !empty($data)) {
            $ar_request = get_object_vars($result["data"]);        
            $result = $ar_request;
        }
        
        return $result;
    }

    public static function isEditable($column_name, $guarded_attributes) 
    {
        $status = DB_COLUMN_NAME_IS_EDITABLE;
        if (in_array($column_name, $guarded_attributes)) {
            $status = DB_COLUMN_NAME_IS_NOT_EDITABLE;
        }
        return $status;
    }

    public static function verifyColumnNameFromModel($model, $column_name) 
    {

        $column_names = array_keys($model->first()->getAttributes());       

        if (in_array($column_name, $column_names)) {
            $status = DB_COLUMN_NAME_EXIST;
        } else {
            $status = DB_COLUMN_NAME_DOESNT_EXIST; // column name not in database
        }

        return $status;
    }

    public static function updateDataBase($model, $column_name, $new_value) 
    {
        $status = UPDATE_DB_FAIL; 
            if ($model) {
                try {                       
                        $model->$column_name = $new_value;
                        $model->updated_by = 1; //Only Admin
                        $model->save();
                        $status = UPDATE_DB_SUCCESS; // successful update                         
                    } 
                catch (QueryException $e) {
                        //echo "Oops! Something went wrong during updating the database. ";
                        echo $e->getMessage();
                    }
                }
        return $status;
    }

    public static function updateSlug($model, $id, $column_name_for_slug_base)
    {

        $status_code = STATUS_CODE_FAIL;
        $message = "";
        $data = null;

        $slug_base = null;
        $table_name = null;
        $current_slug = null;
        $new_slug = null;

        try {

          if($model && $id && $column_name_for_slug_base){

            $table_name = $model["table"];
            $m_instance = $model->find($id);

            if($m_instance){
            
                $current_slug = $m_instance->slug;
                $slug_base_raw = $m_instance->$column_name_for_slug_base;
                $slug_base = strtolower(self::removeSpecialCharExceptDash($slug_base_raw));

                if($slug_base && !empty($slug_base) && $table_name && !empty($table_name)){
                
                    $base_sql = "select id, $column_name_for_slug_base, slug from $table_name where slug='$slug_base'";

                    $increment_sql = "select id, $column_name_for_slug_base, slug from $table_name where slug REGEXP '^$slug_base-[0-9]+'";
                    $sql = "select * from ($base_sql union $increment_sql) combined_table order by slug DESC";
                    $sql_status = self::execute_select_raw_sql($sql);

                    $all_found = $sql_status["data"];

                    if($all_found && !empty($all_found)){
                        $last_int = null;

                        foreach ($all_found as $obj) {
                            $slug = $obj->slug;
                            $pattern = "/\b".$slug_base."-\b/i";
                            $match = preg_match($pattern, $slug);

                            if($match){
                              $slug_in_array = explode("-", $slug);
                              $last_part_of_slug = array_pop($slug_in_array);

                              if(is_numeric($last_part_of_slug)){
                                $current_int = intval($last_part_of_slug);
                                if($last_int && !empty($last_int)){
                                  if($current_int > $last_int){
                                    $last_int = $current_int;
                                  }
                                } else {
                                  $last_int = $current_int;
                                }
                              }
                            }
                          }

                  if($last_int && !empty($last_int)){

                    //$last_slug = $slug_base . "-" . $last_int;
                    $last_slug = $slug_base;

                    if($last_slug == $current_slug){
                      $new_slug = $last_slug;
                    } else {
                      $int = $last_int + 1;
                      //$new_slug = $slug_base . "-" . $int;
                      $new_slug = $slug_base ;
                    }
                  } else {
                    $new_slug = $slug_base; // second unit
                  }

                } else {
                  $message .= "First slug in the database. ";
                  $new_slug = $slug_base;
                }
               
                if($new_slug && !empty($new_slug)){
                  if($current_slug && ($current_slug == $new_slug)){
                    $status_code = STATUS_CODE_SUCCESS;
                    $message .= "New slug is the same. No need to update slug.";
                    $data = $new_slug;
                  } else {
                    $new_slug_lower = strtolower($new_slug);
                    $update_sql = "update $table_name set slug=:PARAM_SLUG where id=:PARAM_ID";
                    $binding_ar = array("PARAM_SLUG"=>$new_slug_lower, "PARAM_ID"=>$id);
                    $update_status = self::execute_update_raw_sql($update_sql, $binding_ar);
                    $message .= "updating slug from '$current_slug' to '$new_slug_lower' for id=$id. ";
                    $status_code = $update_status["status_code"];
                    $message .= $update_status["message"];
                    $data = $new_slug_lower;
                  }
                } else {
                  $message .= "Invalid new slug. Fail to update slug. ";
                }
              } else {
                $message .= "Invalid base slug under column name: $column_name_for_slug_base. Failed to update slug for id=$id. ";
              }
            } else {
              $message .= "Can't find instance for id=$id. "; 
            }
          } else {
            $message .= "Please specify a valid model, id, and colum name to update slug. ";  
          }
        } catch (QueryException $e) {
          $message .= $e->getMessage();
        } catch (Exception $e) {
          $message .= $e->getMessage();
        }

        $result = array("status_code"=>$status_code, "message"=>$message, "data"=>$data);
        return $result;
    }

    public static function checkcolname($model, $column_name) 
    {
        if (self::isEditable($column_name, $model->guardedAttributes())) {
            $status = self::verifyColumnNameFromModel($model, $column_name);          
        } else {
            $status = UPDATE_DB_FAIL_COLUMN_NAME_EXIST_BUT_GUARDED;
        }
        return $status;
    }

    public static function updateDB($model, $column_name, $new_value) 
    {
        $status = UPDATE_DB_FAIL_COLUMN_NAME_EXIST_BUT_GUARDED;
        if (self::isEditable($column_name, $model->guardedAttributes())) {
            $status = self::updateDataBase($model, $column_name, $new_value);
        }
        return $status;
    }

    public static function findByID_OR_SLUG_OBJ($id_or_slug, $type) 
    {

        $status_code     = STATUS_CODE_FAIL;
        $message         = "";
        $data            = null;
        $where_clause    = "";
        $order_by_clause = "";
        $group_by_clause = "";
        $binding_ar      = null;
        $query           = null;    


        if($id_or_slug && !empty($id_or_slug)){

            $id_or_slug_filtered = self::removeSpecialCharExceptDash($id_or_slug);

            if (is_numeric($id_or_slug_filtered)){

                $id = intval($id_or_slug_filtered);
                $where_clause = "(a.id=:PARAM_ID or a.slug=:PARAM_SLUG) and a.status=1";
                $binding_ar = array("PARAM_ID"=>$id, "PARAM_SLUG"=>$id_or_slug_filtered);

            } else if(is_string($id_or_slug_filtered)){

                $where_clause = "a.slug=:PARAM_SLUG and a.status=1";
                $binding_ar = array("PARAM_SLUG"=>$id_or_slug_filtered);

            }

            if($where_clause && !empty($where_clause)){

                $query = self::sql_select_all($type,$where_clause, $group_by_clause,$order_by_clause);
            
                $sql_result  = self::select($query, $binding_ar);

                $status_code = $sql_result["status_code"];
                $message = $sql_result["message"];
                $data = $sql_result["data"] ? $sql_result["data"][0] : NULL;

            } else {
                $message .= "Please input either id or slug to find the object. ";
            }

        } else {
            $message .= "Please input a valid request id to find by id. ";
        }

        $result = array("status_code"=>$status_code, "message"=>$message, "data"=>$data);
        return $result;
    }

    public static function softDelete($model, $id) 
    {
        $result = array("status" => false, "message" => "");
           $id = intval($id);
            try {
                $m = $model->find($id);
                if ($m) {
                    $m->status = 0;
                    $m->deleted_by = 1;
                    $m->save();
                    $m->delete();
                    $result["status"] = true;
                    $result["message"] .= "ID $id has successfully removed from database by $login_id. ";
                } else {
                    $result["message"] .= "ID $id is not found in database. Can't be removed. ";
                }
            } catch (QueryException $e) {
                $result["message"] .= "Oops! Something wrong during removing $id by $login_id. Please try again. ";
            }
        return $result;
    }



   
}

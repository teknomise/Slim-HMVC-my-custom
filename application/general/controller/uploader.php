<?php

namespace Controller;

use Core\BaseController as Base;
use Core\Enum as Enum;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

final class Uploader
{
    protected $view;
    protected $jwt;
    protected $service;
    protected $login_service;

    public function __construct($jwt, $service,$login_service) {
        $this->jwt = $jwt;
        $this->service = $service;
        $this->login_service = $login_service;

    }

    public function image_uploader(Request $request, Response $response, $args) {

        $upload_status = false;
        $result = array("status" => false, "message" => "");
        $slider_id = null;
        $upload_status = null;

        $slider_id_keyword = "id";
        if (array_key_exists($slider_id_keyword, $args)) {
            $slider_id = $args[$slider_id_keyword];
        }

        $type_upload = 'tipe';
        if (array_key_exists($type_upload, $args)) {
            $typeUpload = $args[$type_upload];
        }

        $slug_keyword = 'slug';
        if(array_key_exists($slug_keyword, $args)){
        	$slug_keyword = $args[$slug_keyword];
        }


        if($typeUpload == 1){           
            $path = PATH_PHOTO_THUMBSLIDER_FOLDER;
            $check = "ThumbSlider";
        } elseif ($typeUpload == 2){
            $path = PATH_PHOTO_SLIDER_FOLDER;
            $check = "ImageSlider";
        } elseif ($typeUpload == 3){
            $path = PATH_PHOTO_DESTINASI_BANNER_FOLDER;
            $check = "DestinasiBanner";
        } elseif ($typeUpload == 4){
            $path = PATH_PHOTO_DESTINASI_HOME_FOLDER;
            $check = "ImageSlider";
        } elseif ($typeUpload == 5){
            $basepath = PATH_PHOTO_SATWA;
            $check = "ImageSlider";
            $createpath = $basepath.$slug_keyword;
             if ( !is_dir( $createpath  ) ){
             	$createdir = Base::create_directory($createpath);
             	$path = $createpath.'/';
             } else {
             	$path = $createpath.'/';
             }
        }

        $ar_login_profile = $this->login_service->getLogin_User();
        if ($ar_login_profile) {         

                header('Content-Type: text/plain; charset=utf-8');
                $FILE_STATUS = $this->service->verify_file_from_dropzone($_FILES, $check);            

                if ($FILE_STATUS["status"]) {
                    $file_name = $FILE_STATUS['name'];
                    $file_src_tmp = $FILE_STATUS['tmp_name'];
                    $file_error = $FILE_STATUS['error'];
                    $file_size = $FILE_STATUS['size'];
                    $ext = $FILE_STATUS['ext'];
                   
                    $r_file_name = explode(".", $file_name);

                    if (!empty($slider_id) && is_uploaded_file($file_src_tmp)) {

                        if($typeUpload == 1){           
                            $new_file_name = $r_file_name[0] ."-thumb." . $ext;
                        } elseif ($typeUpload == 2){
                            $new_file_name = $r_file_name[0] ."-slider." . $ext;
                        } elseif ($typeUpload == 3){
                            $new_file_name = $r_file_name[0] ."-destinasi-banner." . $ext;
                        } elseif ($typeUpload == 4){
                            $new_file_name = $r_file_name[0] ."-destinasi-home." . $ext;
                        }  elseif ($typeUpload == 5){
                            $new_file_name = $r_file_name[0] ."-satwa." . $ext;
                        } 

                        $original_file_path_in_local = $path . $new_file_name;
                        $upload_original_image_result = move_uploaded_file($file_src_tmp, $original_file_path_in_local);

                        if( $upload_original_image_result ){
                            $photo_url = $original_file_path_in_local;   
                            $photo_insert_result = $this->service->add_new_images_to_db($new_file_name, $photo_url);  
                            if ($photo_insert_result["status"]) {
                                $upload_status = true;
                                $result = $photo_insert_result['data'];
                  
                            } else {
                                echo "Inserting new project photo to database failed. We should remove the s3 as fallback. ";
                                // fallback mechanism, remove the photo key from aws
                            }
                        } else {
                            echo "Uploading profile picture to cloud failed. ";
                            echo $result["key"]["message"];
                        }
                    }
                } else {
                    echo $FILE_STATUS["message"];
                }          
        
        } else {
            echo "Please login first.";
        }

        // remove temporary public folders
        //$this->service->remove_public_temporary_photo_folder();

        // if ($upload_status) {
        //     return $response->withStatus(200);
        // } else {
        //     return $response->withStatus(404);
        // }

        return json_encode($result);
    }




}
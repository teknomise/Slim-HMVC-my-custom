<?php
/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat, 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */

namespace Helpers;

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

    public static function escape($inp)
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

        return  self::escape(stripslashes(strip_tags(htmlspecialchars($clean, ENT_QUOTES ))));
    }

    public static function get_city_id_by_kota()
    {
        if (isset($_COOKIE['kota']) && empty($_COOKIE['kota-filter']) && empty($_GET['kota'])) {
            $urlkotanya = $_COOKIE['kota'];
            $urlkota = $_COOKIE['kota'];
        } else if (isset($_COOKIE['kota-filter']) && empty($_GET['kota'])) {
            $urlkotanya = $_COOKIE['kota-filter'];
            $urlkota = $_COOKIE['kota-filter'];
        } else if (isset($_GET['kota'])) {
            $urlkotanya = $_GET['kota'];
            $urlkota = $_GET['kota'];
        } else {
            $urlkotanya = 'Jakarta';
            $urlkota = 'Jakarta';
        }

        $_COOKIE['geocityid'] = isset($_COOKIE['idkota-filter']) ? $_COOKIE['idkota-filter'] : "1";
        //tanda
        if (strtoupper($urlkotanya) == 'JADETABEK' || strtoupper($urlkotanya) == 'JABODETABEK' || strtoupper($urlkotanya) == 'JAKARTA') {
            $id_kotanya = 'jkt';
        } else {

            $idkota = Json::decode(self::get_city_id(str_replace('-', ' ', $urlkotanya)));
            
            $id_kotanya = $idkota['cityid'];
            $where = 'cg.child = ' . $id_kotanya;

            $cityidparent = \app\components\ActiveRecord::fetchAll(
                ['table' => 'gf_citygroup cg',
                    'field' => [
                        'cg.parent',
                        'cg.id',
                        'cg.child',
                        'c.city_name'
                    ],
                    'join' => 'JOIN gf_city_detail c ON c.city_id = cg.parent',
                    'conditions' => [$where]
                ]
            );

            if (isset($cityidparent['rows'][0]['city_name'])) {
                if ($cityidparent['rows'][0]['city_name'] == 'Jakarta Selatan' || $cityidparent['rows'][0]['city_name'] == 'Jakarta Utara' || $cityidparent['rows'][0]['city_name'] == 'Jakarta Timur' || $cityidparent['rows'][0]['city_name'] == 'Jakarta Barat' || $cityidparent['rows'][0]['city_name'] == 'Jakarta Pusat') {
                    $id_kotanya = 'jkt';
                } else if (isset($cityidparent['rows'][0]['city_id'])) {
                    $id_kotanya = $cityidparent['rows'][0]['city_id'];
                } else {
                    $id_kotanya = $id_kotanya;
                }
            } else {
                $id_kotanya = $id_kotanya;
            }
        }

        return $id_kotanya;
    }

    public static function get_city_id($kota = null)
    {
        if(isset($_GET['kota']) || isset($kota)){
            if(isset($_GET['kota'])){
                $kota = str_replace('-',' ',Yii::$app->getRequest()->get("kota"));
            }

            $cityId = Yii::$app->db->createCommand('select city_id from gf_city_detail where city_name ="' . $kota . '"')->queryOne();
            $cityId = $cityId['city_id'];

            if ($kota == 'jakarta') {
                $cityId = 'jkt';
            }
            if ($kota == 'jadetabek') {
                $cityId = 'jadetabek';
            }
        } else {
            $cityId = 1;
        }

        return Json::encode(['cityid' => $cityId]);
    }

    public static function apiAction($type, $func, $data)
    {
        return self::connectToAWS($type, $func, $data);
    }

    private static function connectToAWS($type, $func, $postdata)
    {       
            try{
                $api_http = getenv("AWS_SERVER");
                $url = (getenv("ENV") === "dev") ? $api_http."dev/".$func : $api_http."live/".$func;
                $curl = curl_init();

                switch ($type) {
                    case 'POST':
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => $url,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => $type,
                            CURLOPT_POSTFIELDS => $postdata,
                            CURLOPT_HTTPHEADER => array(
                            "Accept: application/json",
                            "Cache-Control: no-cache",
                            "X-Api-Key: ".getenv("X_API_KEY")
                            ),
                        ));
                        break;
                    
                        case 'GET':
                        curl_setopt_array($curl, array(
                            CURLOPT_URL => $url,
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => $type,
                            CURLOPT_HTTPHEADER => array(
                                "Accept: application/json",
                            "Cache-Control: no-cache",
                            "X-Api-Key: ".getenv("X_API_KEY")
                            ),
                        ));
                        break;
                        default:
                        break;
                }
           
                $response = curl_exec($curl);
                $err = curl_error($curl);
                
                curl_close($curl);
                
                if ($err) {
                  throw new ErrorException("cURL Error #:", $err);
                } else {
                  $res = (object) json_decode($response, true);
                 // var_dump($res);die;
                }

                return $res;

            } catch (ErrorException $e) {
                if ($e->getSeverity() === E_ERROR) { 
                    echo("E_ERROR triggered.\n"); 
                  } else if ($e->getSeverity() === E_WARNING) { 
                    echo("E_WARNING triggered.\n"); 
                  } 
                
            }  
    }

    public static function get_json_data_mobile_home($type)
    {
        if (file_exists(RAMO_PATH_ROOT . '/json/home/home.json')) {
            $mobils = json_decode(file_get_contents(RAMO_PATH_ROOT. '/json/home/home.json'), true);
        } else {
            $mobils = ["terpopuler" => [], "terbaru" => [], "future" => [], "cbu" => [], "bekas" => []];
        }

        if (file_exists(RAMO_PATH_ROOT . '/json/home/komparasi.json')) {
            $perbandingan = json_decode(file_get_contents(RAMO_PATH_ROOT . '/json/home/komparasi.json'), true);
        } else {
            $perbandingan = [];
        }

        if (file_exists(RAMO_PATH_ROOT . '/json/home/cbu.json')) {
            $cbu = json_decode(file_get_contents(RAMO_PATH_ROOT . '/json/home/cbu.json'), true);
        } else {
            $cbu = [];
        }

        if (file_exists(RAMO_PATH_ROOT . '/json/home/preloved.json')) {
            $preloved = json_decode(file_get_contents(RAMO_PATH_ROOT . '/json/home/preloved.json'), true);
        } else {
            $preloved = [];
        }

        switch ($type) {
            case 1:
                return [
                    "list_mobil" => [
                        "terpopuler" => $mobils['terpopuler'],
                        "terbaru" => $mobils['terbaru'],
                        "future" => $mobils['future']
                    ]
                ];
                break;

            case 2:
                return [
                    "list_mobil" => [
                    // "cbu" => $mobils['cbu'],
                        "bekas" => $mobils['bekas']
                    ]
                ];
                break;
            case 3:
                return [
                    "list_mobil" => $perbandingan
                ];
                break;
            case 4:
                return [
                    "list_mobil" => [
                        "cbu" => $cbu
                    ]
                ];
            case 5:
                return [
                    "list_mobil" => [
                        "bekas" => $preloved
                    ]
                ];
            default:
                return false;
                break;
        }
    }




}

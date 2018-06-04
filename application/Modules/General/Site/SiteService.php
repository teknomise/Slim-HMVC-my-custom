<?php
  /********************************
 * @Author: Risdyanto Kurniawan
 * @Date:   24 Mei 2018
 * @Last Modified by:   risdyanto
 * @Last Modified time: 
 **********************************/

namespace Application\Modules\General\Site;

use Helpers\BaseService as Base;

class SiteService 
{
    public function __construct(){}
    
    /* -----------------------------------------------------------
    * Service to get motor merek 
    * AWS Lambda Funtion : "get-search-form-params" ['merk']
    * set by : Risdyanto Kurniawan
    *------------------------------------------------------------*/
    
    public function get_merek_motor()
    {
        return $this->check_json_file();
    }

    public function get_merek_mobil()
    {
        return [];
    }

    private function check_json_file()
    {
        $jsonfile = RAMO_PATH_ROOT . MOTOR_MEREK;

        if (file_exists($jsonfile)) {
            $jsondata = json_decode(file_get_contents($jsonfile), true);
            $new_data = $jsondata;
        } else {

            $result = Base::apiAction(
                "GET", 'motor/get-search-form-params', ""
            ); 

            if($result->status === STATUS_CODE_SUCCESS){
                
                $dateversion = strtotime(date("Y-m-d"));
                $new_data = [
                    'data' => $result->data['merk'],
                    'version' => $dateversion
                ];

                $fp = fopen($jsonfile, 'w');
                fwrite($fp, json_encode($new_data, JSON_PRETTY_PRINT));
                fclose($fp);
            } else {
                $new_data = [];
            }
        }

        return $new_data;
    }

    public function get_list_mobil_baru($req)
    {
        if ($req) {
            $params = [
                'kondisi' => 'baru',
                'limit' => LIMIT_MOBIL_PER_PAGE,
                'pagesize' => 0,
                'city_id' => Base::get_city_id_by_kota(),
                'all' => $req->all
            ];

            $urljson = ((int)$params['all'] === 1) ? 'listing-mobil-baru-all.json' : 'listing-mobil-baru-'. $req->pagesize . '.json'; 
            $jsonfile = RAMO_PATH_ROOT . JSON_GLOBAL.$urljson;

            if (file_exists($jsonfile)) {
                $jsondata = json_decode(file_get_contents($jsonfile), true);
                var_dump($jsondata['docs']);die;
                $newCarData = $jsondata;
        
            } else {
                $newCarData = Base::apiAction(
                    "POST", 'motor/get-search-form-params', $params
                ); 
                
               // Yii::$app->rajamobil->getListingNewCarData($params);
               
                $fp = fopen($jsonfile, 'w');
                fwrite($fp, json_encode($newCarData, JSON_PRETTY_PRINT));
                fclose($fp);
            }

            return Json::encode($newCarData);
        }

    }


}
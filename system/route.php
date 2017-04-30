<?php
/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */
$env = getenv("ENV");

// Environtment: Develop
if($env == "develop"){
  include ('router/develop.php');
}
// Environtment: Production
else {
  include ('router/production.php');
}

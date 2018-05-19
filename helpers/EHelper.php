<?php

  /**
 * @Author: Risdyanto Kurniawan
 * @Date:   2018-03-07 13:05:51
 * @Last Modified by:   risdyanto
 * @Last Modified time: 
 */

namespace Helpers;

class EHelper
{
    /**
     * var_dump.
     *
     * @param mixed      $var
     * @param mixed      $echo
     * @param null|mixed $label
     * @param mixed      $strict
     */
    public static function dump($var, $echo = true, $label = null, $strict = true)
    {
        $label = ($label === null) ? '' : rtrim($label) . ' ';
        if (!$strict) {
            if (ini_get('html_errors')) {
                $output = print_r($var, true);
                $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
            } else {
                $output = $label . print_r($var, true);
            }
        } else {
            ob_start();
            var_dump($var);
            $output = ob_get_clean();
            if (!extension_loaded('xdebug')) {
                $output = preg_replace("/\]\=\>\n(\s+)/m", '] => ', $output);
                $output = '<pre>' . $label . htmlspecialchars($output, ENT_QUOTES) . '</pre>';
            }
        }
        if ($echo) {
            echo $output;

            return;
        }

        return $output;
    }

    /**
     * $arr print_r.
     *
     * @param mixed $arr
     */
    public static function p($arr)
    {
        echo '<pre>';
        print_r($arr);
        echo '</pre>';
    }

    /**
     * Get IP
     */
    public static function getClientIP()
    {
        static $ip = null;
        if ($ip !== null) {
            return $ip;
        }

        if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $arr = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            $pos = array_search('unknown', $arr, true);
            if (false !== $pos) {
                unset($arr[$pos]);
            }

            $ip = trim($arr[0]);
        } elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        
        $ip = (false !== ip2long($ip)) ? $ip : '0.0.0.0';

        return $ip;
    }

    /**
     * Make Directory.
     *
     * @param mixed $dir
     * @param mixed $mode
     */
    public static function mkdir($dir, $mode = 0777)
    {
        if (is_dir($dir) || @mkdir($dir, $mode)) {
            return true;
        }

        if (!mk_dir(dirname($dir), $mode)) {
            return false;
        }

        return @mkdir($dir, $mode);
    }

    /**
     * Byte Format.
     *
     * @param mixed $size
     * @param mixed $dec
     */
    public static function byteFormat($size, $dec = 2)
    {
        $a   = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
        $pos = 0;
        while ($size >= 1024) {
            $size /= 1024;
            ++$pos;
        }

        return round($size, $dec) . ' ' . $a[$pos];
    }

    /**
     *  post get.
     *
     * @return unknown
     */
    public static function method()
    {
        return strtoupper(isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : 'GET');
    }

    /**
     * base64_encode.
     *
     * @param mixed $string
     */
    public static function b64encode($string)
    {
        $data = base64_encode($string);
        $data = str_replace(['+', '/', '='], ['-', '_', ''], $data);

        return $data;
    }

    /**
     * base64_decode.
     *
     * @param mixed $string
     */
    public static function b64decode($string)
    {
        $data = str_replace(['-', '_'], ['+', '/'], $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }

        return base64_decode($data, true);
    }

    /**
     * Email Regex Check.
     *
     * @param mixed $str
     */
    public static function email($str)
    {
        if (empty($str)) {
            return true;
        }

        $chars = '/^([a-z0-9+_]|\\-|\\.)+@(([a-z0-9_]|\\-)+\\.)+[a-z]{2,6}$/i';
        if (strpos($str, '@') !== false && strpos($str, '.') !== false) {
            if (preg_match($chars, $str)) {
                return true;
            }

            return false;
        }

        return false;
    }

    /**
     * HP Nomor Regex
     *
     * @param mixed $str
     */
    public static function mobile($str)
    {
        if (empty($str)) {
            return false;
        }

        return preg_match('#^1[3-9][\d]{9}$#', $str);
    }

    /**
     * No Telp Regex.
     *
     * @param mixed $str
     */
    public static function tel($str)
    {
        if (empty($str)) {
            return true;
        }

        return preg_match('/^((\(\d{2,3}\))|(\d{3}\-))?(\(0\d{2,3}\)|0\d{2,3}-)?[1-9]\d{6,7}(\-\d{1,4})?$/', trim($str));
    }

    /**
     * 
     *
     * @param mixed $str
     */
    public static function qq($str)
    {
        if (empty($str)) {
            return true;
        }

        return preg_match('/^[1-9]\d{4,12}$/', trim($str));
    }

    /**
     * Zip Code Regex
     *
     * @param mixed $str
     */
    public static function zipCode($str)
    {
        if (empty($str)) {
            return true;
        }

        return preg_match('/^[1-9]\d{5}$/', trim($str));
    }

    /**
     * IP Regex.
     *
     * @param mixed $str
     */
    public static function ip($str)
    {
        if (empty($str)) {
            return true;
        }

        if (!preg_match('#^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$#', $str)) {
            return false;
        }

        $ip_array = explode('.', $str);

        return ($ip_array[0] <= 255 && $ip_array[1] <= 255 && $ip_array[2] <= 255 && $ip_array[3] <= 255) ? true : false;
    }

    /**
     * Nomor KTP Regex.
     *
     * @param mixed $str
     */
    public static function idCard($str)
    {
        $str = trim($str);
        if (empty($str)) {
            return true;
        }

        if (preg_match('/^([0-9]{15}|[0-9]{17}[0-9a-z])$/i', $str)) {
            return true;
        }

        return false;
    }

    /**
     * url regex
     *
     * @param mixed $str
     */
    public static function url($str)
    {
        if (empty($str)) {
            return true;
        }

        return preg_match('#(http|https|ftp|ftps)://([\w-]+\.)+[\w-]+(/[\w-./?%&=]*)?#i', $str) ? true : false;
    }

    /**
     * sql lite.
     *
     * @param $sql
     */
    public static function splitsql($sql)
    {
        $sql          = preg_replace('/TYPE=(InnoDB|MyISAM|MEMORY)( DEFAULT CHARSET=[^; ]+)?/', 'ENGINE=\\1 DEFAULT CHARSET=' . Yii::app()->db->charset, $sql);
        $sql          = str_replace("\r", "\n", $sql);
        $ret          = [];
        $num          = 0;
        $queriesarray = explode(";\n", trim($sql));
        unset($sql);
        foreach ($queriesarray as $query) {
            $ret[$num] = '';
            $queries   = explode("\n", trim($query));
            $queries   = array_filter($queries);
            foreach ($queries as $query) {
                $str1 = substr($query, 0, 1);
                if ($str1 != '#' && $str1 != '-') {
                    $ret[$num] .= $query;
                }
            }
            ++$num;
        }

        return $ret;
    }

    /**
     * cut string.
     *
     * @param $string
     * @param $length
     * @param $dot
     * @param mixed $charset
     */
    public static function cutstr($string, $length, $dot = '...', $charset = 'utf-8')
    {
        if (strlen($string) <= $length) {
            return $string;
        }

        $pre    = chr(1);
        $end    = chr(1);
        $string = str_replace(['&amp;', '&quot;', '&lt;', '&gt;'], [$pre . '&' . $end, $pre . '"' . $end, $pre . '<' . $end, $pre . '>' . $end], $string);

        $strcut = '';
        if (strtolower($charset) == 'utf-8') {
            $n = $tn = $noc = 0;
            while ($n < strlen($string)) {
                $t = ord($string[$n]);
                if ($t == 9 || $t == 10 || (32 <= $t && $t <= 126)) {
                    $tn = 1;
                    ++$n;
                    ++$noc;
                } elseif (194 <= $t && $t <= 223) {
                    $tn = 2;
                    $n += 2;
                    $noc += 2;
                } elseif (224 <= $t && $t <= 239) {
                    $tn = 3;
                    $n += 3;
                    $noc += 2;
                } elseif (240 <= $t && $t <= 247) {
                    $tn = 4;
                    $n += 4;
                    $noc += 2;
                } elseif (248 <= $t && $t <= 251) {
                    $tn = 5;
                    $n += 5;
                    $noc += 2;
                } elseif ($t == 252 || $t == 253) {
                    $tn = 6;
                    $n += 6;
                    $noc += 2;
                } else {
                    ++$n;
                }

                if ($noc >= $length) {
                    break;
                }
            }
            if ($noc > $length) {
                $n -= $tn;
            }

            $strcut = substr($string, 0, $n);
        } else {
            for ($i = 0; $i < $length; ++$i) {
                $strcut .= ord($string[$i]) > 127 ? $string[$i] . $string[++$i] : $string[$i];
            }
        }

        $strcut = str_replace([$pre . '&' . $end, $pre . '"' . $end, $pre . '<' . $end, $pre . '>' . $end], ['&amp;', '&quot;', '&lt;', '&gt;'], $strcut);

        $pos = strrpos($strcut, chr(1));
        if ($pos !== false) {
            $strcut = substr($strcut, 0, $pos);
        }

        return $strcut . $dot;
    }


    /**
     * covert http://.
     *
     * @param $http
     * @param mixed $url
     *
     * @return string
     */
    public static function convertHttp($url)
    {
        if ($url == 'http://' || $url == '') {
            return '';
        }

        if (substr($url, 0, 7) != 'http://' && substr($url, 0, 8) != 'https://') {
            $str = 'http://' . $url;
        } else {
            $str = $url;
        }

        return $str;
    }

    // Auto charset
    public static function autoCharset($string, $from = 'gbk', $to = 'utf-8')
    {
        $from = strtoupper($from) == 'UTF8' ? 'utf-8' : $from;
        $to   = strtoupper($to) == 'UTF8' ? 'utf-8' : $to;
        if (strtoupper($from) === strtoupper($to) || empty($string) || (is_scalar($string) && !is_string($string))) {
           
            return $string;
        }
        if (is_string($string)) {
            if (function_exists('mb_convert_encoding')) {
                return mb_convert_encoding($string, $to, $from);
            } elseif (function_exists('iconv')) {
                return iconv($from, $to, $string);
            }

            return $string;
        } elseif (is_array($string)) {
            foreach ($string as $key => $val) {
                $_key          = self::autoCharset($key, $from, $to);
                $string[$_key] = self::autoCharset($val, $from, $to);
                if ($key != $_key) {
                    unset($string[$key]);
                }
            }

            return $string;
        }

        return $string;
    }

    /*
     * microtime
     */

    public static function utime($inms)
    {
        $utime = preg_match('/^(.*?) (.*?)$/', microtime(), $match);
        $utime = $match[2] + $match[1]; //echo $utime;echo "<br>";
        if ($inms) {
            $utime *= 10000;
        } //echo $utime;exit;
        return substr($utime, 0, 14);
    }

    /**
     * Encodes an arbitrary variable into JSON format.
     *
     * @param mixed $var   any number, boolean, string, array, or object to be encoded.
     *                     If var is a string, it will be converted to UTF-8 format first before being encoded.
     * @param mixed $data
     * @param mixed $jsonp
     *
     * @return string JSON string representation of input var
     */
    public static function echoJson($data, $jsonp = '')
    {
        header('Content-type: application/json; charset=utf-8');
        if (empty($jsonp)) {
            echo JSON::encode($data);
        } else {
            echo $jsonp . '(' . JSON::encode($data) . ')';
        }
    }

    /**
     * [checkHttpHeaders ].
     *
     * @return [bool] [description]
     */
    public static function checkHttpHeaders()
    {
        if (isset($_SERVER['HTTP_APIGEEHEADER']) && $_SERVER['HTTP_APIGEEHEADER'] === 'yaochufaapi!') {
            return true;
        }
        if (isset($_SERVER['HTTP_APIHANDSHAKE']) && ($_SERVER['HTTP_APIHANDSHAKE'] === 'yaochufaapi!') || $_SERVER['HTTP_APIHANDSHAKE'] === 'yaochufa') {
            return true;
        }

        return false;
    }

    /* check null */

    public static function checkNull($str)
    {
        $str = trim($str);
        if (empty($str)) {
            return;
        }

        return $str;
    }

    /**
     * Array to String.
     *
     * @param string $glue  
     * @param array  $array 
     * @param
     * @param mixed $field
     */
    public static function arr2str($glue, $array, $field = '')
    {
        if (!is_array($array)) {
            return $array;
        }

        $newarr = [];
        foreach ($array as $key => $value) {
            if ($field) {
                $newarr[] = $value[$field];
            } else {
                if (is_array($array)) {
                    $value = implode($glue, $value);
                }
                $newarr[] = $value;
            }
        }

        return implode($glue, $newarr);
    }

    //check file existed
    public static function checkFileExists($file)
    {
        if (preg_match('/^http:\/\//', $file)) {
            
            $curl = curl_init($file);
           
            curl_setopt($curl, CURLOPT_NOBODY, true);
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 2);
           
            $result = curl_exec($curl);
            $found  = false;
           
            if ($result !== false) {
               
                $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
                if ($statusCode == 200) {
                    $found = true;
                }
            }
            curl_close($curl);

            return $found;
        }

        return file_exists($file);
    }

    /**
     * API Result Standrard.
     *
     * @param string $code    
     * @param string $message  
     * @param string $content  
     * @param string $callback
     */
    public static function apiResultStandard($code, $message = null, $content = null, $callback = null)
    {
        $params = [
            'code'      => $code,
            'message'   => $message,
            'timeStamp' => time(),
            'content'   => $content,
        ];

        return self::echoJson($params, $callback);
    }

    /**
     * Get a Hash.
     *
     * @param [type] $len 
     *
     * @return [type] 
     */
    public static function geraHash($len)
    {
        if ($len < 1) {
            return false;
        }

        return substr(str_shuffle(str_repeat('abcdefghijklmnopqrstuvwxyz0123456789', $len)), 0, $len);
    }

    /**
     * Show message.
     *
     * @param mixed $type
     * @param mixed $content
     * @param mixed $url
     */
    public static function message($type, $content, $url = '')
    {
        $referer = Yii::$app->request->getReferrer();
        $click   = $url ? $url : ($referer ? $referer : 'javascript:history.back()');
        $html    = <<<EOT
			<!DOCTYPE html>
			<html lang="id">
			<head>
				<meta charset="UTF-8">
				<meta name="renderer" content="webkit">
				<meta http-equiv="X-UA-Compatible" content="IE=Edge">
				<title>Pesan</title>
				</head>
				<style>
					.success h1{color: #74CC00;}
					.error h1{color: red;}
				</style>
			<body>
			<div class="container">
				<div class="wrapper">
					<div style="padding:30px 15px;text-align:center;" class="cloum mb0 $type">
						<!--<div class="cloum-title"><h3>Pesan：</h3></div>-->
						<h1 style="padding: 0 0 10px;font-size: 20px;" class="block">$content</h1>
						<p>Pesannya<a style="color:#29a2da;text-decoration:none;" href="$click">Klik Disini</a></p>
					</div>
				</div>
			</div>
			<script type="text/javascript">

			    var url = "$url";
			    setTimeout(function(){
			        if(url){
			            window.location.href = url;
			        }else{
			            history.back();
			        }
			    }, 3000);

			</script>
			</body>
			</html>
EOT;
        echo $html;
        exit();
    }
}

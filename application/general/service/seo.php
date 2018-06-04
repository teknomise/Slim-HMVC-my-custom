<?php

  /**
 * @Author: Risdyanto Kurniawan
 * @Date:   7 Mei 2018
 * @Last Modified by:   risdyanto
 * @Last Modified time: 
 */

namespace Application\General\Service;

class Seo {

    public static function home()
    {
        return self::theme(0);
    }

    private static function robotTag()
    {
        switch ($_SERVER['HTTP_HOST']):
            case 'www.rajamobil.com':
             $tag_robot = 
                '<meta name="googlebot-news" content="index, follow">
                 <meta name="googlebot" content="index, follow">
                 <meta name="robots" content=" index, follow">
                 <meta name="google-site-verification" content="omdJ-1H9QerrImdV8cjcN1KfI_6j3AeWBnBvqGMjSNM">        
                ';
                break;
            default:
            $tag_robot = 
                '<meta name="googlebot-news" content="no-index,no-follow">
                 <meta name="googlebot" content="no-index,no-follow">
                 <meta name="robots" content="no-index,no-follow">';
                break;
        endswitch;
        return $tag_robot;
    }

    private static function theme($type)
    {
        switch ($type) {
            case 1:
               
                break;
            
            default:
                $arr_seo = [
                    "description" => "Beli Mobil Baru dan Mobil Bekas Secara Online, Tidak Perlu ke Dealer, Proses Cepat dan Mudah. Dapatkan Penawaran Harga Mobil , TDP Murah dan Angsuran Ringan.",
                    "keywords" => "rajamobil, bursa mobil, jual beli mobil, mobil baru, mobil bekas, harga mobil, harga mobil baru, harga mobil bekas, mobil baru murah, mobil bekas murah, promo mobil baru",
                    "title" => "Beli Mobil Online Cepat dan Mudah - RajaMobil.com",
                    "type" => "website",
                    "url" => "https://www.rajamobil.com",
                    "image" => "https://www.rajamobil.com/assets/images/logo/logo-rajamobil.png",
                    "name" => "PT. RajaMobil Media",
                    "cannonical" => "https://rajamobil.com"
                ];
                break;
        }

        $seo_theme = '
            <title>'.$arr_seo["title"].'</title>
            <meta name="description" content="'.$arr_seo["description"].'" />
            <!-- Schema.org markup for Google+ -->
            <meta itemprop="name" content="'.$arr_seo['name'].'">
            <meta itemprop="description" content="'.$arr_seo['description'].'">
            <meta itemprop="image" content="'.$arr_seo['image'].'">
            <meta itemprop="url" content="'.$arr_seo['url'].'">
            
            <!-- Twitter Card data -->
            <meta name=”twitter:card” content=”summary_large_image”>
            <meta name="twitter:site" content="@RajaMobilCom">
            <meta name="twitter:title" content="'.$arr_seo['title'].'">
            <meta name="twitter:description" content="'.$arr_seo["description"].'">
            <meta name="twitter:creator" content="@RajaMobilCom">
            <meta name="twitter:image" content="'.$arr_seo["image"].'">
                
            <!-- Open Graph data -->
            <meta property="fb:app_id" content="181411581975733">
            <meta property="og:title" content="'.$arr_seo['title'].'" />
            <meta property="og:type" content="article" />
            <meta property="og:url" content="'.$arr_seo['url'].'" />
            <meta property="og:image" content="'.$arr_seo['image'].'" />
            <meta property="og:description" content="'.$arr_seo["description"].'" />
            <meta property="og:site_name" content="'.$arr_seo['name'].'" />
                
            <meta name="msvalidate.01" content="EF945FF5D3FE1A18CCA2F16107AF3A37">
            <link rel="canonical" href="'.$arr_seo["cannonical"].'" />
        ';

        return $seo_theme.self::robotTag();
    }

  
}
?>

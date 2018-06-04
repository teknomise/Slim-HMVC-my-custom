<?php

/**
 * @Author: Risdyanto Kurniawan
 * @Date:   Jumat, 28 April 2017
 * @Last Modified by:   
 * @Last Modified time: 
 */

namespace Helpers;

 class BaseController
{

    public function removeSpecialCharExceptDash($str){
        $pattern = array("/\s+/", "/[^a-zA-Z0-9-]/", "/-+/");
        $replace = array("-", "", "-");
        $new_str = preg_replace($pattern, $replace, $str);
        return $new_str;
    }
    
    public function removeSpecialChar($str){
        $pattern = array("/\s+/", "/[^a-zA-Z0-9]/");
        $replace = array("", "");
        $new_str = preg_replace($pattern, $replace, $str);
        return $new_str;
    }

    public function getUriWithoutParam($request){
        $result = "";
        $full_uri = $request->getUri();
        $uri_ar = explode("?", $full_uri, 2);
        $result = $uri_ar[0];
        return $result;
    }

    public function getValue($source_array, $key){
        $result = null;
        if (isset($source_array[$key]) || array_key_exists($key, $source_array)) { 
            $result = $source_array[$key];
        }
        return $result;
    }

    public function lastVisitURL($url) { 
        return $_SESSION['last_visit'] = $url; 
    }

    public function create_directory( $target ) {
        $wrapper = null;

        // strip the protocol
        if( $target  ) {
            list( $wrapper, $target ) = explode( '://', $target, 2 );
        }

        // from php.net/mkdir user contributed notes
        $target = str_replace( '//', '/', $target );

        // put the wrapper back on the target
        if( $wrapper !== null ) {
            $target = $wrapper . '//' . $target;
        }

        // safe mode fails with a trailing slash under certain PHP versions.
        $target = rtrim($target, '/'); // Use rtrim() instead of untrailingslashit to avoid formatting.php dependency.
        if ( empty($target) )
            $target = '/';

        if ( file_exists( $target ) )
            return @is_dir( $target );
        // We need to find the permissions of the parent folder that exists and inherit that.
        $target_parent = dirname( $target );
        while ( '.' != $target_parent && ! is_dir( $target_parent ) ) {
            $target_parent = dirname( $target_parent );
        }

        // Get the permission bits.
        if ( $stat = @stat( $target_parent ) ) {
            $dir_perms = $stat['mode'] & 0007777;
        } else {
            $dir_perms = 0777;
        }

        if ( @mkdir( $target, $dir_perms, true ) ) {

            // If a umask is set that modifies $dir_perms, we'll have to re-set the $dir_perms correctly with chmod()
            if ( $dir_perms != ( $dir_perms & ~umask() ) ) {
                $folder_parts = explode( '/', substr( $target, strlen( $target_parent ) + 1 ) );
                for ( $i = 1; $i <= count( $folder_parts ); $i++ ) {
                    @chmod( $target_parent . '/' . implode( '/', array_slice( $folder_parts, 0, $i ) ), $dir_perms );
                }
            }

            return true;
        }

        return false;
    }

}

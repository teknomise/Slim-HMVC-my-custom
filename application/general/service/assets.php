<?php

  /**
 * @Author: Risdyanto Kurniawan
 * @Date:   7 Mei 2018
 * @Last Modified by:   risdyanto
 * @Last Modified time: 
 */

namespace Application\General\Service;

use MatthiasMullie\Minify;

class Assets {

    public function minifyCSS()
    {
        $sourcePath = '/path/to/source/css/file.css';
        $minifier = new Minify\CSS($sourcePath);

        // we can even add another file, they'll then be
        // joined in 1 output file
        $sourcePath2 = '/path/to/second/source/css/file.css';
        $minifier->add($sourcePath2);

        // or we can just add plain CSS
        $css = 'body { color: #000000; }';
        $minifier->add($css);

        // save minified file to disk
        $minifiedPath = '/path/to/minified/css/file.css';
        $minifier->minify($minifiedPath);

        // or just output the content
        echo $minifier->minify();
    }

    public function minifyJS()
    {
        $sourcePath = '/path/to/source/css/file.js';
        $minifier = new Minify\JS($sourcePath);

        // we can even add another file, they'll then be
        // joined in 1 output file
        $sourcePath2 = '/path/to/second/source/css/file.js';
        $minifier->add($sourcePath2);

        // or we can just add plain js
        $js = 'var test = 1';
        $minifier->add($js);

        // save minified file to disk
        $minifiedPath = '/path/to/minified/js/file.js';
        $minifier->minify($minifiedPath);

        // or just output the content
        echo $minifier->minify();
    }

}


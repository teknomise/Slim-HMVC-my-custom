/*!
 * This automation task for Teknomise Project front end development
 * https://satwakita.id
 * author : Risdyanto Kurniawan
 */

module.exports = function(grunt) {

    'use strict';

    grunt.initConfig({

        watch: {           
            files: ["assets/css/*.css", "assets/js/*.js", "assets/css-develop/*.css","admin-assets/js/*.js", 
            "admin-assets/js/app/*.js", "admin-assets/css/*.css"],
            tasks: ["jshint", "uglify", "cssmin", "concat"],
        },


        jshint: {
            //all: ['Gruntfile.js', 'lib/**/*.js', 'test/**/*.js']
            all: ['Gruntfile.js', 'assets/js/*.js', 'admin-assets/js/*.js', 'admin-assets/js/app/*.js']
        },
       
        uglify: {
            options: {
                mangle: true,
                preserveComments: /(?:^!|@(?:license|preserve|cc_on))/
            },
            my_target: {
                files: {
                    'assets/js-min/main-min.js': ['assets/js/*.js'],
                    'assets/js/js-vendor/slick.min.js':['assets/js/js-vendor/slick.js'],
                    'admin-assets/js/minified/jqueryall.min.js':['admin-assets/js/jquery/*.js'],
                    'admin-assets/js/minified/vendorall.min.js':['admin-assets/js/vendor/*.js'],
                    'admin-assets/js/minified/customall.min.js':['admin-assets/js/*.js'],
                    'admin-assets/js/minified/appall.min.js':['admin-assets/js/app/*.js']
              }
            }
        },

        cssmin: {
            target: {
                files: {
                  'assets/css-min/main.min.css': ['assets/css/*.css'],
                  'assets/css-min/style.min.css': ['assets/css-develop/*.css'],
                  'admin-assets/css/vendor.min.css':['admin-assets/css/vendor/*.css'],
                  'admin-assets/css/style.min.css':['admin-assets/css/style.css']
                }
            }
        }, 

        concat: {
            js: {
                src: ['assets/js/js-vendor/modernizr-2.6.2.min.js', 'assets/js/jquery/jquery.min.js', 'assets/js/jquery/jquery.easing.1.3.js',
                'assets/js/js-vendor/bootstrap.min.js', 'assets/js/jquery/jquery.waypoints.min.js',
                'assets/js/jquery/jquery.countTo.js','assets/js/jquery/jquery.magnific-popup.min.js','assets/js/jquery/jquery.stellar.min.js','assets/js/js-vendor/slick.min.js'],
                //'assets/js-min/main-min.js'],
                dest: 'assets/js-min/built-main.min.js'
            },
          /*css: {
            src: 'src/css/*.css',
            dest: 'dest/css/concat.css'
          }*/
        },

    });

    // Load all grunt task

    // watch files changes
    grunt.loadNpmTasks('grunt-contrib-watch');

    // Optimize images
    //grunt.loadNpmTasks('grunt-image');

    // Validate JS code
    grunt.loadNpmTasks('grunt-contrib-jshint');

    // Delete not needed files
    //grunt.loadNpmTasks('grunt-contrib-clean');

    // Uglify
    grunt.loadNpmTasks('grunt-contrib-uglify');

    // Lint CSS
    //grunt.loadNpmTasks('grunt-contrib-csslint');

    // grunt concat
    grunt.loadNpmTasks('grunt-contrib-concat');

    // grunt cssmin
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.registerTask('default', ['watch']);

};

<?php

return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production

        // PHP Renderer settings
        'renderer' => [
            'template_path' => PATH_ROOT.'application/',
        ],

        // Twig View settings
        'view' => [
            'template_path' => PATH_ROOT.'application/',
            'cache_path' => PATH_ROOT.'var/cache/',
            'debug' => true,
        ],
        // Monolog settings
        'logger' => [
            'name' => 'log-error',
            'path' => PATH_ROOT.'var/logs/error.log',
        ],
        'routerCacheFile' => PATH_ROOT . 'var/tmp/routes.cache.php',
        'session' => [
            // Session cookie settings
            'name'           => 'slim_session',
            'lifetime'       => 24,
            'path'           => '/',
            'domain'         => null,
            'secure'         => true,
            'httponly'       => true,
    
            // Set session cookie path, domain and secure automatically
            'cookie_autoset' => true,
    
            // Path where session files are stored, PHP's default path will be used if set null
            'save_path'      => null,
    
            // Session cache limiter
            'cache_limiter'  => 'nocache',
    
            // Extend session lifetime after each user activity
            'autorefresh'    => false,
    
            // Encrypt session data if string is set
            'encryption_key' => 'Bbhidu7yga83980108883708&@*73$$DCYH5637&',
    
            // Session namespace
            'namespace'      => 'rajamobil_app'
        ],
        'assets' => [
            // Public assets cache directory
            'path' => PATH_ROOT.'public/cache',//'/var/www/example.com/htdocs/public/cache',
            'source' => PATH_ROOT.'public/',
            // Cache settings
            'cache_enabled' => true,
            'cache_path' => PATH_ROOT.'var/',
            'cache_name' => 'assets-cache',
            'cache_lifetime' => 0,
            // Enable JavaScript and CSS compression
            'minify' => 1
        ]
    ],
];

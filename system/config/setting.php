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
    ],
];

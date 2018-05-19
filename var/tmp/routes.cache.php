<?php return array (
  0 => 
  array (
    'GET' => 
    array (
      '/sorry' => 'route0',
      '/' => 'route1',
      '/paket-umroh/' => 'route2',
    ),
  ),
  1 => 
  array (
    'GET' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/paket\\-umroh/([a-zA-Z0-9\\-]+))$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route3',
            1 => 
            array (
              'slug' => 'slug',
            ),
          ),
        ),
      ),
    ),
  ),
);
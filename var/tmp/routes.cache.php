<?php return array (
  0 => 
  array (
    'POST' => 
    array (
      '/ajax/get-merek-baru' => 'route0',
      '/ajax/get-list-mobil-baru' => 'route1',
      '/cari-motor-baru' => 'route6',
    ),
    'GET' => 
    array (
      '/sorry' => 'route2',
      '/' => 'route3',
      '/detail-motor/' => 'route4',
    ),
  ),
  1 => 
  array (
    'GET' => 
    array (
      0 => 
      array (
        'regex' => '~^(?|/detail\\-motor/([a-zA-Z0-9\\-]+))$~',
        'routeMap' => 
        array (
          2 => 
          array (
            0 => 'route5',
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
<?php

declare(strict_types=1);

return [
    'enabled' => env('TELESCOPE_DASHBOARD_ENABLED', true),
    'path' => env('TELESCOPE_DASHBOARD_PATH', 'telescope-dashboard'),
    'gate' => env('TELESCOPE_DASHBOARD_GATE', 'viewTelescope'),
    'connection' => env('DB_CONNECTION_TELESCOPE', env('DB_CONNECTION', 'mysql')),
    'per_page' => 50,
    'max_per_page' => 200,
    'route_groups' => [
        'api' => '/api/v*',
        'nova-api' => '/nova-api/*',
        'web' => '/*',
    ],
    'telescope_path' => env('TELESCOPE_PATH', 'telescope'),
    'middleware' => ['web'],
];

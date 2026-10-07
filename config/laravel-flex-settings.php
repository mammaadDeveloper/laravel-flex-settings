<?php

declare(strict_types=1);

return [
    'placeholder' => 'default',

    'default_group' => env('LARAVEL_FLEX_SETTINGS_DEFAULT_GROUP', 'default'),

    'groups' => [
        'default' => 'General',
    ],

    'database' => [
        'table' => env('LARAVEL_FLEX_SETTINGS_TABLE', 'settings'),
    ],

    'cache' => [
        'enabled' => env('LARAVEL_FLEX_SETTINGS_CACHE_ENABLED', true),
        'key' => env('LARAVEL_FLEX_SETTINGS_CACHE_KEY', 'settings.all'),
        'ttl' => env('LARAVEL_FLEX_SETTINGS_CACHE_TTL', 3600),
    ],
];

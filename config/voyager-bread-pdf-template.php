<?php

return [

    /*
     * If enabled for voyager-bread-pdf-template package.
     */
    'enabled' => env('VOYAGER_BREAD_PDF_TEMPLATE_ENABLED', true),

    /*
     * The config_key for voyager-bread-pdf-template package.
     */
    'config_key' => env('VOYAGER_BREAD_PDF_TEMPLATE_CONFIG_KEY', 'joy-voyager-bread-pdf-template'),

    /*
     * The route_prefix for voyager-bread-pdf-template package.
     */
    'route_prefix' => env('VOYAGER_BREAD_PDF_TEMPLATE_ROUTE_PREFIX', 'joy-voyager-bread-pdf-template'),

    /*
    |--------------------------------------------------------------------------
    | Controllers config
    |--------------------------------------------------------------------------
    |
    | Here you can specify voyager controller settings
    |
    */

    'controllers' => [
        'namespace' => 'Joy\\VoyagerBreadPdfTemplate\\Http\\Controllers',
    ],
];

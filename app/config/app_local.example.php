<?php
/*
 * Local configuration file to provide any overrides to your app.php configuration.
 * Copy and save this file as app_local.php and make changes as required.
 */
return [
    'debug' => filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN),

    'Security' => [
        'salt' => env('SECURITY_SALT', '__SALT__'),
    ],

    'Datasources' => [
        'default' => [
            'host' => 'db',
            'port' => '3306',
            'username' => 'cake_user',
            'password' => 'cake_password',
            'database' => 'cake_db',
            'url' => env('DATABASE_URL', null),
        ],
        'test' => [
            'host' => 'db',
            'port' => '3306',
            'username' => 'cake_user',
            'password' => 'cake_password',
            'database' => 'test_cake_db',
            'url' => env('DATABASE_TEST_URL', null),
        ],
    ],

    'EmailTransport' => [
        'default' => [
            'host' => 'localhost',
            'port' => 25,
            'username' => null,
            'password' => null,
            'client' => null,
            'url' => env('EMAIL_TRANSPORT_DEFAULT_URL', null),
        ],
    ],
];

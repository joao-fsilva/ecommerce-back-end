<?php

return [
    'paths' => [
        'migrations' => 'db/migrations',
        'seeds' => 'db/seeds',
    ],
    'environments' => [
        'default_migration_table' => 'phinxlog',
        'default_environment' => 'development',
        'testing' =>  [
            'adapter' => DB_CONNECTION_TESTS['driver'],
            'host' => DB_CONNECTION_TESTS['host'],
            'name' => DB_CONNECTION_TESTS['database'],
            'user' => DB_CONNECTION_TESTS['username'],
            'pass' => DB_CONNECTION_TESTS['password'],
            'port' => DB_CONNECTION_TESTS['port'],
            'charset' => DB_CONNECTION_TESTS['charset'],
        ],
    ],
    'version_order' => 'creation'
];

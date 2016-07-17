<?php
return [
    'modules'                 => [
        'Application',
        'Shop',
        'Blog',
    ],
    'module_listener_options' => [
        'config_glob_paths'        => [
            PROJECT_ROOT . '/config/autoload/{,*.}{global,local}.php',
        ],
        'module_paths'             => [
            PROJECT_ROOT . '/module',
            PROJECT_ROOT . '/vendor',
        ],
        'cache_dir'                => PROJECT_ROOT . '/data/cache',
        'config_cache_enabled'     => false,
        'config_cache_key'         => 'module_config_cache',
        'module_map_cache_enabled' => false,
        'module_map_cache_key'     => 'module_map_cache',
    ],
];

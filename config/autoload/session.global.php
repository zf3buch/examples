<?php
return [
    'dependencies' => [
        'factories' => [
            Zend\Session\Config\SessionConfig::class =>
                Zend\Session\Service\SessionConfigFactory::class,
        ],
    ],

    'session_config' => [
        'save_path'       => realpath(APPLICATION_ROOT . '/data/session'),
        'name'            => 'MY_SESSION',
        'cookie_lifetime' => 365 * 24 * 60 * 60,
        'gc_maxlifetime'  => 720,
    ],
];

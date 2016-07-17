<?php
return [
  'console' => [
    'router' => [
      'routes' => [
        'create-command' => [
          'options' => [
            'route'    => 'create user [--verbose|-v] <email> <password>',
            'defaults' => [
              'controller' => Console\ConsoleController::class,
              'action'     => 'create',
            ],
          ],
        ],
      ],
    ],
  ],
];

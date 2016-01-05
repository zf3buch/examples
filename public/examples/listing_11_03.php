<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\Navigation\Navigation;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// setup pages
$pages = [
    'first'  => [
        'type'  => 'uri',
        'label' => 'First',
        'uri'   => '#',
        'pages' => [
            'a' => [
                'type'  => 'uri',
                'label' => 'A',
                'uri'   => '#',
            ],
            'b' => [
                'type'  => 'uri',
                'label' => 'b',
                'uri'   => '#',
            ],
        ],
    ],
    'second' => [
        'type'  => 'uri',
        'label' => 'Second',
        'uri'   => '#',
    ],
];

// instantiate navigation
$navigation = new Navigation($pages);

// output some data
Debug::dump($navigation->getPages());

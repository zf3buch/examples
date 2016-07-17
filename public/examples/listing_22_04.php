<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Cache\StorageFactory;
use Zend\Debug\Debug;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// configure cache
$storageConfig = [
    'adapter' => [
        'name'    => 'filesystem',
        'options' => [
            'ttl'       => 3,
            'cache_dir' => APPLICATION_ROOT . '/data/cache',
        ],
    ],
    'plugins' => [
        'exception_handler' => [
            'throw_exceptions' => false,
        ],
    ],
];

$cache = StorageFactory::factory($storageConfig);

// set cache id
$cacheId = md5(__FILE__);

// check cache
if ($cache->hasItem($cacheId)) {
    $result = $cache->getItem($cacheId, $success);
} else {
    $result = date('Y-m-d H:i:s');
    $cache->setItem($cacheId, $result);
}

Debug::dump($cacheId, 'Cache ID');
Debug::dump($result, 'Cache Content');

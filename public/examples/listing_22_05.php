<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Cache\PatternFactory;
use Zend\Cache\StorageFactory;
use Zend\Debug\Debug;
use Zend\Math\Rand;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

/**
 * Class RandomNumber
 */
class RandomNumber
{
    /**
     * @return int
     */
    static public function get()
    {
        return Rand::getInteger(10000, 99999);
    }
}

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
        'serializer',
    ],
];

$cache = StorageFactory::factory($storageConfig);

// configure cache
$patternConfig = [
    'class'        => 'RandomNumber',
    'storage'      => $cache,
    'cache_output' => true,
];

/** @var RandomNumber $cachedRandomNumber */
$cachedRandomNumber = PatternFactory::factory('class', $patternConfig);

$normalRandomNumber = new RandomNumber();

$cachedNumber = $cachedRandomNumber->get();
$unCachedNumber = $normalRandomNumber->get();

Debug::dump($cachedNumber, 'Cached Number');
Debug::dump($unCachedNumber, 'Uncached Number');

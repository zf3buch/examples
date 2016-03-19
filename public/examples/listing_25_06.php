<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Config\Factory;
use Zend\Debug\Debug;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// Load config data from a directory
$mergedConfig = Factory::fromFiles([
    APPLICATION_ROOT . '/config/autoload/session.global.php',
    APPLICATION_ROOT . '/config/autoload/some.config.ini'
]);

// set output file
$cacheFile = APPLICATION_ROOT . '/data/cache/config.json';

// Write config data to file
Factory::toFile($cacheFile, $mergedConfig);

$fileCheck = file_exists($cacheFile);

Debug::dump($fileCheck, 'File check');

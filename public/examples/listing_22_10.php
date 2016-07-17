<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Config\Config;
use Zend\Debug\Debug;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// instantiate config
$configObject      = new Config(['foo' => 'bar'], true);
$configObject->bar = 'foo';

$configArray = $configObject->toArray();

Debug::dump($configObject, 'Config object');
Debug::dump($configArray, 'Config array');

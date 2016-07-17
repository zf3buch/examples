<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\Filter\Compress;
use Zend\Filter\StaticFilter;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// use static filter
$alphaResult           = StaticFilter::execute('P1ZZ4', 'Alpha');
$stringToLowerResult   = StaticFilter::execute('PIZZA', 'StringToLower');
$dashToCamelCaseResult = StaticFilter::execute(
    'pizza-service', 'WordDashToCamelCase'
);

Debug::dump($alphaResult, 'Result Alpha filter');
Debug::dump($stringToLowerResult, 'Result StringToLower filter');
Debug::dump($dashToCamelCaseResult, 'Result DashToCamelCase filter');

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
use Zend\Filter\StringToLower;
use Zend\Filter\Word\DashToCamelCase;
use Zend\I18n\Filter\Alpha;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// use Alpha filter
$alphaFilter = new Alpha();
$alphaResult = $alphaFilter->filter('P1ZZ4');

// use StringToLower filter
$stringToLowerFilter = new StringToLower();
$stringToLowerResult = $stringToLowerFilter->filter('PIZZA');

// use DashToCamelCase filter
$dashToCamelCaseFilter = new DashToCamelCase();
$dashToCamelCaseResult = $dashToCamelCaseFilter->filter('pizza-service');

Debug::dump($alphaResult, 'Result Alpha filter');
Debug::dump($stringToLowerResult, 'Result StringToLower filter');
Debug::dump($dashToCamelCaseResult, 'Result DashToCamelCase filter');

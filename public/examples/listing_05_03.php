<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Filter\Compress;
use Zend\Filter\FilterChain;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// create filter chain
$filterChain = new FilterChain();
$filterChain->attachByName('Alpha');
$filterChain->attachByName('Word\CamelCaseToDash');
$filterChain->attachByName('StringToLower');

$result = $filterChain->filter('Pizza123Service');

var_dump($result);

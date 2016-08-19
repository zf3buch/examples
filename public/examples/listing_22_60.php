<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\Session\Container;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// instantiate counter session container
$counter         = new Container('counter');
$counter->number = $counter->number + 1;

// instantiate random session container
$random = new Container('random');

$numberList   = (array)$random->offsetGet('numberList');
$numberList[] = mt_rand(1000, 9999);

$random->offsetSet('numberList', $numberList);

Debug::dump($counter->number, 'Counter number');
Debug::dump($random->numberList, 'Random number list');

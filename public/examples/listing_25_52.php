<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\Validator\StaticValidator;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// use Alpha validator
$alphaResult      = StaticValidator::execute('P1ZZ4', 'Alpha');
$creditCardResult = StaticValidator::execute(
    '4111111111111111', 'CreditCard'
);
$inArrayResult    = StaticValidator::execute(
    'blue', 'InArray', ['haystack' => ['red', 'green', 'white']]
);

Debug::dump($alphaResult);
Debug::dump($creditCardResult);
Debug::dump($inArrayResult);

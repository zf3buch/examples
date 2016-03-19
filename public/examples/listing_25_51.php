<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\I18n\Validator\Alpha;
use Zend\Validator\CreditCard;
use Zend\Validator\InArray;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// use Alpha validator
$alphaValidator = new Alpha();
$alphaResult    = $alphaValidator->isValid('P1ZZ4');
$alphaMessages  = $alphaValidator->getMessages();

Debug::dump($alphaResult, 'Alpha result');
Debug::dump($alphaMessages, 'Alpha messages');

// use CreditCard filter
$creditCardValidator = new CreditCard();
$creditCardResult    = $creditCardValidator->isValid('4111111111111111');
$creditCardMessages  = $creditCardValidator->getMessages();

Debug::dump($creditCardResult, 'CreditCard result');
Debug::dump($creditCardMessages, 'CreditCard messages');

// use InArray filter
$inArrayValidator = new InArray(['haystack' => ['red', 'green', 'white']]);
$inArrayResult    = $inArrayValidator->isValid('blue');
$inArrayMessages  = $inArrayValidator->getMessages();

Debug::dump($inArrayResult, 'InArray result');
Debug::dump($inArrayMessages, 'InArray messages');

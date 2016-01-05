<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\I18n\Validator\Alpha;
use Zend\Validator\CreditCard;
use Zend\Validator\InArray;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// use Alpha validator
$alphaValidator = new Alpha();
Debug::dump($alphaValidator->isValid('P1ZZ4'));
Debug::dump($alphaValidator->getMessages());

// use CreditCard filter
$creditCardValidator = new CreditCard();
Debug::dump($creditCardValidator->isValid('4111111111111111'));
Debug::dump($creditCardValidator->getMessages());

// use InArray filter
$inArrayValidator = new InArray(['haystack' => ['red', 'green', 'white']]);
Debug::dump($inArrayValidator->isValid('blue'));
Debug::dump($inArrayValidator->getMessages());

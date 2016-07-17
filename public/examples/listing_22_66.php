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
use Zend\Validator\StringLength;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// use Alpha validator
$alphaValidator = new Alpha();
$alphaValidator->setMessage(
    'Der Wert "%value%" enthält nicht nur Buchstaben!'
);
$alphaResult   = $alphaValidator->isValid('P1ZZ4');
$alphaMessages = $alphaValidator->getMessages();

Debug::dump($alphaResult, 'Alpha result');
Debug::dump($alphaMessages, 'Alpha messages');

// use StringLength filter
$stringLengthValidator = new StringLength(['min' => 6, 'max' => 32]);
$stringLengthValidator->setMessage(
    'Der Wert muss zwischen %min% und %max% Zeichen lang sein.'
);
$stringLengthResult = $stringLengthValidator->isValid('Pizza');
$stringLengthMessages = $stringLengthValidator->getMessages();

Debug::dump($stringLengthResult, 'StringLength result');
Debug::dump($stringLengthMessages, 'StringLength messages');

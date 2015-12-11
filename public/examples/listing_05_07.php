<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

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
var_dump($alphaValidator->isValid('P1ZZ4'));
var_dump($alphaValidator->getMessages());

// use StringLength filter
$stringLengthValidator = new StringLength(['min' => 6, 'max' => 32]);
$stringLengthValidator->setMessage(
    'Der Wert muss zwischen %min% und %max% Zeichen lang sein.'
);
var_dump($stringLengthValidator->isValid('Pizza'));
var_dump($stringLengthValidator->getMessages());

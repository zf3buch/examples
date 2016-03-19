<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\Validator\ValidatorChain;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// create validator chain
$validatorChain = new ValidatorChain();
$validatorChain->attachByName('Alpha');
$validatorChain->attachByName('StringLength', ['min' => 6, 'max' => 32]);
$validatorChain->attachByName('PostCode');

$result   = $validatorChain->isValid('P1zz4');
$messages = $validatorChain->getMessages();

Debug::dump($result, 'Validator chain result');
Debug::dump($messages, 'Validator chain messages');

<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Customer\Entity;
use Zend\Debug\Debug;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// setup data
$inputData = [
    'id'        => '1',
    'full_name' => 'Theo Tester',
    'address'   => ['Am Testen 123', '12345', 'Testen'],
];

// instantiate customer entity
$customer = new Entity();
$customer->setId($inputData['id']);
$customer->setFullName($inputData['full_name']);
$customer->setAddress($inputData['address']);

// initialize output data
$outputData = [
    'id'        => $customer->getId(),
    'full_name' => $customer->getFullName(),
    'address'   => $customer->getAddress(),
];

Debug::dump($customer);
Debug::dump($outputData);

<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Customer\CustomerEntity;
use Zend\Debug\Debug;
use Zend\Hydrator\ClassMethods;

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
$customer = new CustomerEntity();

// instantiate hydrator
$hydrator = new ClassMethods();
$hydrator->hydrate($inputData, $customer);

// get output data
$outputData = $hydrator->extract($customer);

Debug::dump($customer, 'Customer entity');
Debug::dump($outputData, 'Output data');

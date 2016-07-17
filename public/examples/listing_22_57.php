<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\ServiceManager\ServiceManager;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// configure service manager
$serviceManager = new ServiceManager(
    [
        'factories'  => [
            Customer\CustomerForm::class => InvokableFactory::class,
            Customer\CustomerService::class => Customer\CustomerServiceFactory::class,
        ],
    ]
);

// get customer form and service
$customerForm    = $serviceManager->get(Customer\CustomerForm::class);
$customerService = $serviceManager->get(Customer\CustomerService::class);

Debug::dump($customerForm, 'Customer form');
Debug::dump($customerService, 'Customer service');

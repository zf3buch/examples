<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

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
            Customer\Form::class => InvokableFactory::class,
            Customer\Service::class => Customer\ServiceFactory::class,
        ],
    ]
);

// get customer form and service
$customerForm    = $serviceManager->get(Customer\Form::class);
$customerService = $serviceManager->get(Customer\Service::class);

var_dump($customerForm);
var_dump($customerService);

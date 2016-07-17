<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

// define application root for better file path definitions
use Pizza\PizzaListener;
use Pizza\PizzaService;
use Zend\EventManager\EventManager;

define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

$eventManager = new EventManager();

$pizzaListener = new PizzaListener();
$pizzaListener->attach($eventManager);

$pizzaService = new PizzaService();
$pizzaService->setEventManager($eventManager);

$pizzaData = [
    'id'   => '123',
    'name' => 'Pizza Salami',
];

$pizzaService->sendPizza($pizzaData);

<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Pizza\PizzaEntity;
use Zend\Db\Adapter\Adapter;
use Zend\Db\ResultSet\HydratingResultSet;
use Zend\Debug\Debug;
use Zend\Hydrator\ClassMethods;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// configure database
$config = [
    'driver' => 'pdo',
    'dsn'    => 'mysql:dbname=examples;host=localhost;charset=utf8',
    'user'   => 'example-user',
    'pass'   => 'geheim',
];

// create result set prototype
$resultSetPrototype = new HydratingResultSet(
    new ClassMethods(), new PizzaEntity()
);

// instantiate adapter
$adapter = new Adapter($config, null, $resultSetPrototype);

// generate SQL statement
$sql = 'SELECT * FROM pizza';

// prepare and execute query
$result = $adapter->query($sql, Adapter::QUERY_MODE_EXECUTE);

$currentResult = $result->current();

// output result
Debug::dump($currentResult, 'Current result');

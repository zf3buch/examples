<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;
use Zend\Debug\Debug;

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

// instantiate adapter
$adapter = new Adapter($config);

// instantiate sql object
$sql = new Sql($adapter);

// build insert
$insert = $sql->insert();
$insert->into('pizza');
$insert->columns(['name']);
$insert->values(['name' => 'Pizza Wundertüte']);

// build sql string
$sqlString = $sql->buildSqlString($insert);

// output sql string
Debug::dump($sqlString);

// prepare and execute query
$result = $adapter->query($sqlString)->execute();

// get new id
$id = $result->getGeneratedValue();

// build delete
$delete = $sql->delete();
$delete->from('pizza');
$delete->where->equalTo('id', $id);

// build sql string
$sqlString = $sql->buildSqlString($delete);

// output sql string
Debug::dump($sqlString);

// prepare and execute query
$result = $adapter->query($sqlString)->execute();

// output deleted rows
Debug::dump($result->getAffectedRows());

<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Ddl\Column\Datetime;
use Zend\Db\Sql\Ddl\Column\Integer;
use Zend\Db\Sql\Ddl\Column\Varchar;
use Zend\Db\Sql\Ddl\Constraint\PrimaryKey;
use Zend\Db\Sql\Ddl\CreateTable;
use Zend\Db\Sql\Ddl\DropTable;
use Zend\Db\Sql\Sql;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// configure database
$config = [
    'driver' => 'pdo',
    'dsn'    => 'mysql:dbname=vote-my-pizza;host=localhost;charset=utf8',
    'user'   => 'vote-my-pizza',
    'pass'   => 'geheim',
];

// instantiate adapter
$adapter = new Adapter($config);

// instantiate sql object
$sql = new Sql($adapter);

// create new table
$createTable = new CreateTable('pizza_temp');
$createTable->addColumn(new Integer('id'));
$createTable->addColumn(new Varchar('name', 64));
$createTable->addColumn(new Datetime('date'));
$createTable->addConstraint(new PrimaryKey('id'));

// build sql string
$sqlString = $sql->buildSqlString($createTable);

// output sql string
var_dump($sqlString);

// prepare and execute query
$result = $adapter->query($sqlString)->execute();

// prepare and execute query
$result = $adapter->query('SHOW TABLES')->execute();

foreach ($result as $table) {
    var_dump($table);
}

// drop new table
$dropTable = new DropTable('pizza_temp');

// build sql string
$sqlString = $sql->buildSqlString($dropTable);

// output sql string
var_dump($sqlString);

// prepare and execute query
$result = $adapter->query($sqlString)->execute();

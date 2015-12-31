<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\TableGateway;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Adapter\DbTableGateway;
use Zend\Paginator\Paginator;

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
$dbAdapter = new Adapter($config);

// instantiate table gateway
$tableGateway = new TableGateway('pizza', $dbAdapter);

// configure paginator adapter
$paginatorAdapter = new DbTableGateway($tableGateway, null, 'name ASC');

// instantiate paginator
$paginator = new Paginator($paginatorAdapter);
$paginator->setItemCountPerPage(3);

// loop through elements
for ($page = 1; $page <= 6; $page++) {
    $paginator->setCurrentPageNumber($page);

    echo "<hr>";
    var_dump('Page ' . $page);

    foreach ($paginator->getCurrentItems() as $currentItem) {
        var_dump($currentItem);
    }
}

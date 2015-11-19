<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Db\Adapter\Adapter;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// configure database
$config = array(
    'driver'  => 'pdo',
    'dsn'     => 'mysql:dbname=vote-my-pizza;host=localhost;charset=utf8',
    'user'    => 'vote-my-pizza',
    'pass'    => 'geheim',
);

// instantiate adapter
$adapter = new Adapter($config);

// test adapter
var_dump($adapter->getPlatform()->getName());
var_dump($adapter->getCurrentSchema());

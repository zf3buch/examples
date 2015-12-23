<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Authentication\Adapter\DbTable\CallbackCheckAdapter;
use Zend\Authentication\AuthenticationService;
use Zend\Db\Adapter\Adapter;

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

// instantiate database adapter
$dbAdapter = new Adapter($config);

// instantiate authentication adapter
$authAdapter = new CallbackCheckAdapter(
    $dbAdapter,
    'user',
    'email',
    'password',
    function ($hash, $password) {
        return password_verify($password, $hash);
    }
);

// instantiate authentication service
$authService = new AuthenticationService();

// test with unknown user
$authAdapter->setIdentity('honk');
$authAdapter->setCredential('test');

$result = $authService->authenticate($authAdapter);

var_dump($result->isValid());
var_dump($result->getIdentity());
var_dump($result->getMessages());

echo "<hr>";

// test with known user and wrong password
$authAdapter->setIdentity('kunde@vote-my-pizza.de');
$authAdapter->setCredential('test');

$result = $authService->authenticate($authAdapter);

var_dump($result->isValid());
var_dump($result->getIdentity());
var_dump($result->getMessages());

echo "<hr>";

// test with known user and right password
$authAdapter->setIdentity('kunde@vote-my-pizza.de');
$authAdapter->setCredential('test123');

$result = $authService->authenticate($authAdapter);

var_dump($result->isValid());
var_dump($result->getIdentity());
var_dump($result->getMessages());

echo "<hr>";

// check authentication service
var_dump($authService->hasIdentity());
var_dump($authService->getIdentity());

echo "<hr>";

// clear identity
$authService->clearIdentity();

var_dump($authService->hasIdentity());
var_dump($authService->getIdentity());


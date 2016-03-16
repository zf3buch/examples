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

// test with known user and right password
$authAdapter->setIdentity('kunde@vote-my-pizza.de');
$authAdapter->setCredential('test123');

// authenticate
$result = $authService->authenticate($authAdapter);

// get authenticated user
$user = $authAdapter->getResultRowObject(null, ['password']);

// write user to storage as identity
$authService->getStorage()->write($user);

// check identity
Debug::dump($authService->hasIdentity());
Debug::dump($authService->getIdentity());

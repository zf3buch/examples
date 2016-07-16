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

// test with unknown user
$authAdapter->setIdentity('honk');
$authAdapter->setCredential('test');

$result = $authService->authenticate($authAdapter);

$isValid  = $result->isValid();
$identity = $result->getIdentity();
$messages = $result->getMessages();

Debug::dump($isValid, 'honk/test result is valid?');
Debug::dump($identity, 'honk/test result identity');
Debug::dump($messages, 'honk/test result messages');

// test with known user and wrong password
$authAdapter->setIdentity('kunde@vote-my-pizza.de');
$authAdapter->setCredential('test');

$result = $authService->authenticate($authAdapter);

$isValid  = $result->isValid();
$identity = $result->getIdentity();
$messages = $result->getMessages();

Debug::dump($isValid, 'kunde@vote-my-pizza.de/test result is valid?');
Debug::dump($identity, 'kunde@vote-my-pizza.de/test result identity');
Debug::dump($messages, 'kunde@vote-my-pizza.de/test result messages');

// test with known user and right password
$authAdapter->setIdentity('kunde@vote-my-pizza.de');
$authAdapter->setCredential('test123');

$result = $authService->authenticate($authAdapter);

$isValid  = $result->isValid();
$identity = $result->getIdentity();
$messages = $result->getMessages();

Debug::dump($isValid, 'kunde@vote-my-pizza.de/test123 result is valid?');
Debug::dump($identity, 'kunde@vote-my-pizza.de/test123 result identity');
Debug::dump($messages, 'kunde@vote-my-pizza.de/test123 result messages');

// check authentication service
$hasIdentity = $authService->hasIdentity();
$identity    = $authService->getIdentity();

Debug::dump($hasIdentity, 'auth service has identity, after authentication');
Debug::dump($identity, 'auth service identity, after authentication');

// clear identity
$authService->clearIdentity();

$hasIdentity = $authService->hasIdentity();
$identity    = $authService->getIdentity();

Debug::dump($hasIdentity, 'auth service has identity, after clearing');
Debug::dump($identity, 'auth service identity, after clearing');


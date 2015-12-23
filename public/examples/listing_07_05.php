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
use Zend\Crypt\Password\Bcrypt;
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
    function ($securePass, $password) {
        $bcrypt        = new Bcrypt();
        $authenticated = $bcrypt->verify($password, $securePass);

        return $authenticated;
    }
);

var_dump($authAdapter);

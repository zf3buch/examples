<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Diactoros\Server;
use Zend\Stratigility\Http\Response;
use Zend\Stratigility\MiddlewarePipe;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// create new middleware pipe
$app = new MiddlewarePipe();

$app->pipe(
    '/examples/' . pathinfo(__FILE__)['filename'] . '.php/pizza',
    function ($req, $res) {
        /** @var Response $res */
        return $res->write('Pizza für alle!');
    }
);

$app->pipe(
    '/examples/' . pathinfo(__FILE__)['filename'] . '.php',
    function ($req, $res) {
        /** @var Response $res */
        return $res->write('Luigis Homepage');
    }
);

// instantiate server and listen to request
$server = Server::createServer(
    $app, $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);
$server->listen();

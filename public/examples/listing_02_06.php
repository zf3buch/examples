<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Diactoros\Request;
use Zend\Diactoros\Server;
use Zend\Stratigility\MiddlewarePipe;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// create new middleware pipe
$app = new MiddlewarePipe();
$app->pipe(
    '/',
    function ($request, $response, $next) {
        if (!in_array($request->getUri()->getPath(), ['/', ''], true)) {
            return $next($request, $response);
        }

        return $response->end('Luigis Home Page!');
    }
);
$app->pipe(
    '/pizza',
    function ($request, $response, $next) {
        return $response->end('Pizza für alle!');
    }
);

// insantiate server and listen to request
$server = Server::createServer(
    $app, $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);
$server->listen();

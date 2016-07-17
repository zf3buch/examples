<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\Diactoros\Request;
use Zend\Diactoros\Response;
use Zend\Diactoros\Uri;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// instantiate uri
$uri = new Uri('http://www.zendframeworkbuch.de/');

// instantiate request
$request = new Request(
    $uri,
    'POST',
    'php://memory',
    [
        'Content-Type' => 'application/json',
    ]
);

Debug::dump($request, 'Request object');

// instantiate client for demonstration
//$client = new Client();
//$response = $client->send($request);

/** @var Response $response */
$response = new Response();

// get data from response
$statusCode = $response->getStatusCode();
$headers    = $response->getHeaders();
$body       = $response->getBody();

Debug::dump($statusCode, 'Response status Code');
Debug::dump($headers, 'Response headers');
Debug::dump($body, 'Response body');

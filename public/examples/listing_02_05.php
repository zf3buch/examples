<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Diactoros\ServerRequestFactory;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// instantiate server request
$request = ServerRequestFactory::fromGlobals(
    $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
);

// get data from request
$queryParams   = $request->getQueryParams();
$cookieParams  = $request->getCookieParams();
$uploadedFiles = $request->getUploadedFiles();
$method        = $request->getMethod();

var_dump($queryParams);
var_dump($cookieParams);
var_dump($uploadedFiles);
var_dump($method);

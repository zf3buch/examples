<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// load file content
$fileName    = realpath(
    APPLICATION_ROOT . '/phpunit.xml'
);
$fileContent = implode('', file($fileName));

echo '<pre>';
echo htmlspecialchars($fileContent) . "\n";
echo "</pre>";

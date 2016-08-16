<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Book\Book;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// load file content
$fileName    = realpath(
    APPLICATION_ROOT . '/src/Book/Book.php'
);
$fileContent = implode('', file($fileName));

echo '<pre>';
echo htmlspecialchars($fileContent) . "\n";

echo '$book = new Book();' . "\n";
echo '$book->addPage(1);' . "\n";
echo '$book->addPage(2);' . "\n";

$book = new Book();
$book->addPage(1);
$book->addPage(2);

var_dump($book);

echo "</pre>";

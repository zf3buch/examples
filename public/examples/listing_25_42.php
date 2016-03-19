<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\Paginator\Adapter\ArrayAdapter;
use Zend\Paginator\Paginator;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// define some number
$numbers = range(100, 999);

// instantiate paginator
$paginator = new Paginator(new ArrayAdapter($numbers));
$paginator->setCurrentPageNumber(mt_rand(1, 40));
$paginator->setItemCountPerPage(20);

$currentItems = $paginator->getCurrentItems();
$totalItemCount = $paginator->getTotalItemCount();
$pages = $paginator->getPages();

// output some data
Debug::dump($currentItems, 'Current items');
Debug::dump($totalItemCount, 'Total item count');
Debug::dump($pages, 'Paginator pages');

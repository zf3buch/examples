<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\View\Model\JsonModel;
use Zend\View\Renderer\JsonRenderer;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// create JsonModel and set variables
$jsonModel = new JsonModel(['headline' => 'Happy welcome!']);
$jsonModel->setVariable('name', 'Luigi');
$jsonModel->setVariables(['list' => ['Foo', 'Bar', 'Baz']]);

// prepare renderer
$renderer = new JsonRenderer();

// render and output template
echo $renderer->render($jsonModel);

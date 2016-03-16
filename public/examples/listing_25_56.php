<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\View\Model\ViewModel;
use Zend\View\Renderer\PhpRenderer;
use Zend\View\Resolver\TemplatePathStack;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// create ViewModel and set variables and template
$viewModel = new ViewModel(['headline' => 'Happy welcome!']);
$viewModel->setVariable('name', 'Luigi');
$viewModel->setVariables(['list' => ['Foo', 'Bar', 'Baz']]);
$viewModel->setTemplate('listing_25_55');

// prepare resolve with path stack
$resolver = new TemplatePathStack(
    ['script_paths' => [APPLICATION_ROOT . '/templates']]
);

// prepare renderer
$renderer = new PhpRenderer();
$renderer->setResolver($resolver);

// render and output template
echo $renderer->render($viewModel);

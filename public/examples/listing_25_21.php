<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Form;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// instantiate text element
$name = new Text('name');
$name->setLabel('Your Name');
$name->setAttribute('class', 'my-class');
$name->setAttribute('maxlength', 64);

// instantiate text area
$comment = new Textarea('comment');
$comment->setLabel('Your Comment');
$comment->setAttribute('class', 'another-class');
$comment->setAttributes(['rows' => 4, 'cols' => '64']);

// instantiate submit button
$submit = new Submit('submit');
$submit->setValue('Save Comment');
$submit->setAttribute('id', 'submit');

// instantiate form and add elements
$form = new Form();
$form->setAttribute('action', '/form/sent');
$form->add($name);
$form->add($comment);
$form->add($submit);

$formAttributes = $form->getAttributes();
$formElements = $form->getElements();

// instantiate form view helper directly
Debug::dump($formAttributes, 'Form attributes');
Debug::dump($formElements, 'Form elements');

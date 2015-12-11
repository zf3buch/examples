<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Form\Element\Submit;
use Zend\Form\Element\Text;
use Zend\Form\Element\Textarea;
use Zend\Form\Factory;
use Zend\Form\Fieldset;
use Zend\Form\Form;
use Zend\Form\FormElementManager;
use Zend\ServiceManager\Config;
use Zend\ServiceManager\ServiceManager;

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

var_dump($form->getAttributes());
echo "<br>";
var_dump($form->getElements());
echo "<br>";

// define configuration array
$formArray = [
    'attributes' => [
        'action' => '/form/sent',
    ],
    'elements'   => [
        [
            'spec' => [
                'name'       => 'name',
                'type'       => 'text',
                'options'    => [
                    'label' => 'Your Name',
                ],
                'attributes' => [
                    'class'     => 'my-class',
                    'maxlength' => '64',
                ],
            ],
        ],
        [
            'spec' => [
                'name'       => 'comment',
                'type'       => 'textarea',
                'options'    => [
                    'label' => 'Your Comment',
                ],
                'attributes' => [
                    'class' => 'another-class',
                    'rows'  => '4',
                    'cols'  => '64',
                ],
            ],
        ],
        [
            'spec' => [
                'name'       => 'submit',
                'type'       => 'submit',
                'options'    => [
                    'value' => 'Save Comment',
                ],
                'attributes' => [
                    'id' => 'submit',
                ],
            ],
        ],
    ],
];

// instantiate form factory
$factory = new Factory();
$factory->setFormElementManager(
    new FormElementManager(new Config())
);

// build form with configuration array
$form = $factory->createForm($formArray);

var_dump($form->getAttributes());
echo "<br>";
var_dump($form->getElements());
echo "<br>";
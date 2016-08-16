<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\Form\Factory;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

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
                    'label' => 'Dein Name',
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
                    'label' => 'Dein Kommentar',
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
                    'value' => 'Kommentar speichern',
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

// build form with configuration array
$form = $factory->createForm($formArray);

$formAttributes = $form->getAttributes();
$formElements   = $form->getElements();

Debug::dump($formAttributes, 'Form attributes');
Debug::dump($formElements, 'Form elements');

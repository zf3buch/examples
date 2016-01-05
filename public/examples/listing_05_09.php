<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\InputFilter\InputFilter;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// instantiate input filter
$inputFilter = new InputFilter();
$inputFilter->add([
    'name' => 'email',
    'required' => true,
    'filters' => [
        [
            'name' => 'Striptags',
        ],
    ],
    'validators' => [
        [
            'name' => 'EmailAddress',
            'options' => [
                'message' => 'Dies ist keine E-Mail Adresse!'
            ],
        ]
    ],
]);
$inputFilter->add([
    'name' => 'name',
    'required' => true,
    'filters' => [
        [
            'name' => 'StringTrim',
        ],
    ],
    'validators' => [
        [
            'name' => 'StringLength',
            'options' => [
                'min'     => 6,
                'max'     => 32,
                'message' => 'Nur %min% bis %max% Zeichen erlaubt!'
            ],
        ]
    ],
]);

$invalidInputData = [
    'email' => '<b>Nur Text</b>',
    'name'  => ' Ralf ',
];

$inputFilter->setData($invalidInputData);
$result = $inputFilter->isValid();

Debug::dump($result);
Debug::dump($inputFilter->getValues());
Debug::dump($inputFilter->getMessages());

$validInputData = [
    'email' => '<b>ralf@travello.com</b>',
    'name'  => ' Ralf Eggert ',
];

$inputFilter->setData($validInputData);
$result = $inputFilter->isValid();

Debug::dump($result);
Debug::dump($inputFilter->getValues());
Debug::dump($inputFilter->getMessages());

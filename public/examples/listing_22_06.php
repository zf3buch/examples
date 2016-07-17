<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\DocBlock\Tag\ParamTag;
use Zend\Code\Generator\DocBlock\Tag\ReturnTag;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\PropertyGenerator;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// generate class doc block
$classDocBlock = DocBlockGenerator::fromArray(
    [
        'shortDescription' => 'Sample generated class',
        'longDescription'  => 'This is a generated class generated.',
        'tags'             => [
            [
                'name'        => 'author',
                'description' => 'Ralf Eggert <ralf@travello.de>',
            ],
        ],
    ]
);

// generate method
$method = MethodGenerator::fromArray(
    [
        'name'       => 'setValue',
        'parameters' => ['value'],
        'body'       => '$this->value = $value;' . "\n"
            . 'return $this;',
        'docblock'   => DocBlockGenerator::fromArray(
            [
                'shortDescription' => 'Set the value property',
                'longDescription'  => null,
                'tags'             => [
                    new ParamTag('value', ['string']),
                    new ReturnTag(['string']),
                ],
            ]
        ),
    ]
);

// generate class
$class = new ClassGenerator();
$class->setName('SampleClass');
$class->setDocBlock($classDocBlock);
$class->addConstant('FIXED',  true);
$class->addProperties(
    [
        ['value', null, PropertyGenerator::FLAG_PRIVATE],
    ]
);
$class->addMethods([$method]);

$generatedClass = $class->generate();

// output class
echo '<pre>' . $generatedClass . '</pre>';

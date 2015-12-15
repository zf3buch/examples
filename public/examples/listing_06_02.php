<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\I18n\Translator\Translator;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// instantiate translator
$translator = new Translator();

// add one translation file
$translator->addTranslationFile(
    'PhpArray',
    APPLICATION_ROOT . '/language/de_DE.php',
    'default',
    'de_DE'
);

// add translation files for path
$translator->addTranslationFilePattern(
    'PhpArray',
    APPLICATION_ROOT . '/language/',
    '%s.php',
    'default'
);

// Set locale and output texts
$translator->setLocale('de_DE');
var_dump($translator->translate('message_saving_successful'));
var_dump($translator->translate('message_saving_failed'));
var_dump($translator->translate('label_firstname'));
var_dump($translator->translate('label_lastname'));

// Change locale and output texts
$translator->setLocale('en_US');
var_dump($translator->translate('message_saving_successful'));
var_dump($translator->translate('message_saving_failed'));
var_dump($translator->translate('label_firstname'));
var_dump($translator->translate('label_lastname'));

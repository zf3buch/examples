<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\I18n\Translator\Translator;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// instantiate translator
$translator = new Translator();

// add one translation file
$translator->addTranslationFile(
    'phparray',
    APPLICATION_ROOT . '/language/de_DE.php',
    'default',
    'de_DE'
);

// add translation files for path
$translator->addTranslationFilePattern(
    'phparray',
    APPLICATION_ROOT . '/language/',
    '%s.php',
    'default'
);

// Set locale and output texts
$translator->setLocale('de_DE');

$deSuccessMessage = $translator->translate('message_saving_successful');
$deFailedMessage = $translator->translate('message_saving_failed');
$deFirstname = $translator->translate('label_firstname');
$deLastname = $translator->translate('label_lastname');

Debug::dump($deSuccessMessage, 'German translations');
Debug::dump($deFailedMessage);
Debug::dump($deFirstname);
Debug::dump($deLastname);

// Change locale and output texts
$translator->setLocale('en_US');

$enSuccessMessage = $translator->translate('message_saving_successful');
$enFailedMessage = $translator->translate('message_saving_failed');
$enFirstname = $translator->translate('label_firstname');
$enLastname = $translator->translate('label_lastname');

Debug::dump($enSuccessMessage, 'English translations');
Debug::dump($enFailedMessage);
Debug::dump($enFirstname);
Debug::dump($enLastname);


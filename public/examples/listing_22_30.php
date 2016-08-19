<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\Filter\Compress;
use Zend\Filter\Decompress;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// setup text to compress
$originalText = str_pad('This is a test! ', 65536, 'This is a test! ');

// use Compress filter
$compressFilter = new Compress('Gz');
$compressedText = $compressFilter->filter($originalText);

// use Decompress filter
$decompressFilter = new Decompress('Gz');
$decompressedText = $decompressFilter->filter($compressedText);

Debug::dump(strlen($originalText), 'Length of original text');
Debug::dump($originalText, 'Original text');

Debug::dump(strlen($compressedText), 'Length of compressed text');
Debug::dump($compressedText, 'Compressed text');

Debug::dump(strlen($decompressedText), 'Length of decompressed text');
Debug::dump($decompressedText, 'Decompressed text');

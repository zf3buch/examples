<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Http\Client;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// define branches
$branches = [
    'chapter_02_01' => 'http://zf3buch.vote-my-pizza/',
    'chapter_03_01' => 'http://zf3buch.vote-my-pizza/pizza',
    'chapter_04_01' => 'http://zf3buch.vote-my-pizza/pizza',
    'chapter_05_01' => 'http://zf3buch.vote-my-pizza/pizza',
    'chapter_06_01' => 'http://zf3buch.vote-my-pizza/de/pizza',
    'chapter_07_01' => 'http://zf3buch.vote-my-pizza/de/pizza',
    'chapter_08_01' => 'http://zf3buch.vote-my-pizza/de/pizza',
    'chapter_08_02' => 'http://zf3buch.vote-my-pizza/de/pizza',
    'chapter_08_03' => 'http://zf3buch.vote-my-pizza/de/pizza',
    'chapter_08_04' => 'http://zf3buch.vote-my-pizza/de',
    'chapter_08_05' => 'http://zf3buch.vote-my-pizza/de',
    'chapter_08_06' => 'http://zf3buch.vote-my-pizza/de',
    'cached_08_06'  => 'http://zf3buch.vote-my-pizza/de',
];

// define branch to check
$checkBranch = 'cached_08_06';

// define number of runs
$runs = 100;

// define log file
$logFile = APPLICATION_ROOT . '/data/log/performance.log';

// instantiate client
$client = new Client($branches[$checkBranch]);

// read data
if (file_exists($logFile)) {
    $data = file($logFile);
} else {
    $data = [];
}

// initialize tracks
$newRow = [$checkBranch];

// loop defined times of $runs
for ($count = 0; $count < $runs; $count++) {
    // start time track
    $timeStart = microtime(true);

    // send request
    $response = $client->send();

    // stop time track
    $timeStop = microtime(true);

    // add to row
    $newRow[] = round($timeStop - $timeStart, 4);
}

$data[] = implode(';', $newRow) . ';' . "\n";

file_put_contents($logFile, $data);

echo('Run branch: ' . $checkBranch);

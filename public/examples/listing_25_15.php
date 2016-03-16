<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Db\Adapter\Adapter;
use Zend\Db\TableGateway\Feature\FeatureSet;
use Zend\Db\TableGateway\Feature\MasterSlaveFeature;
use Zend\Db\TableGateway\TableGateway;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// configure database
$config = [
    'driver' => 'pdo',
    'dsn'    => 'mysql:dbname=examples;host=localhost;charset=utf8',
    'user'   => 'example-user',
    'pass'   => 'geheim',
];

// instantiate adapter
$masterAdapter = new Adapter($config);
$slaveAdapter  = new Adapter($config);

// instantiate feature set
$featureSet = new FeatureSet();
$featureSet->addFeature(new MasterSlaveFeature($slaveAdapter));

// instantiate table gateway instance
$table = new TableGateway('pizza', $masterAdapter, $featureSet);

<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Permissions\Rbac\Rbac;
use Zend\Permissions\Rbac\Role;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// instantiate new guest role
$guestRole = new Role('guest');
$guestRole->addPermission('article.show');

// instantiate new editor role
$editorRole = new Role('editor');
$editorRole->addChild($guestRole);
$editorRole->addPermission('article.edit');

// instantiate new admin role
$adminRole = new Role('admin');
$adminRole->addChild($editorRole);
$adminRole->addPermission('article.delete');

// instantiate new RBAC
$rbac = new Rbac();
$rbac->addRole($guestRole);
$rbac->addRole($editorRole);
$rbac->addRole($adminRole);

// ask rights for guest role
var_dump($rbac->isGranted('guest', 'article.show'));
var_dump($rbac->isGranted('guest', 'article.edit'));
var_dump($rbac->isGranted('guest', 'article.delete'));

echo "<hr>";

// ask rights for editor role
var_dump($rbac->isGranted('editor', 'article.show'));
var_dump($rbac->isGranted('editor', 'article.edit'));
var_dump($rbac->isGranted('editor', 'article.delete'));

echo "<hr>";

// ask rights for admin role
var_dump($rbac->isGranted('admin', 'article.show'));
var_dump($rbac->isGranted('admin', 'article.edit'));
var_dump($rbac->isGranted('admin', 'article.delete'));

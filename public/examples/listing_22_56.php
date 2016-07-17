<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
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
$guestArticleShow = $rbac->isGranted('guest', 'article.show');
$guestArticleEdit = $rbac->isGranted('guest', 'article.edit');
$guestArticleDelete = $rbac->isGranted('guest', 'article.delete');

Debug::dump($guestArticleShow, 'Guest article show');
Debug::dump($guestArticleEdit, 'Guest article edit');
Debug::dump($guestArticleDelete, 'Guest article delete');

// ask rights for editor role
$editorArticleShow = $rbac->isGranted('editor', 'article.show');
$editorArticleEdit = $rbac->isGranted('editor', 'article.edit');
$editorArticleDelete = $rbac->isGranted('editor', 'article.delete');

Debug::dump($editorArticleShow, 'Editor article show');
Debug::dump($editorArticleEdit, 'Editor article edit');
Debug::dump($editorArticleDelete, 'Editor article delete');

// ask rights for admin role
$adminArticleShow = $rbac->isGranted('admin', 'article.show');
$adminArticleEdit = $rbac->isGranted('admin', 'article.edit');
$adminArticleDelete = $rbac->isGranted('admin', 'article.delete');

Debug::dump($adminArticleShow, 'Admin article show');
Debug::dump($adminArticleEdit, 'Admin article edit');
Debug::dump($adminArticleDelete, 'Admin article delete');

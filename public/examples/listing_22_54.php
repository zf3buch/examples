<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

use Zend\Debug\Debug;
use Zend\Permissions\Acl\Acl;
use Zend\Permissions\Acl\Resource\GenericResource;
use Zend\Permissions\Acl\Role\GenericRole;

// define application root for better file path definitions
define('APPLICATION_ROOT', realpath(__DIR__ . '/../..'));

// setup autoloading from composer
require_once APPLICATION_ROOT . '/vendor/autoload.php';

// instantiate roles
$guestRole = new GenericRole('guest');
$editorRole = new GenericRole('editor');
$adminRole = new GenericRole('admin');

// instantiate resources
$articleResource = new GenericResource('article');

// instantiate new ACL
$acl = new Acl();
$acl->addRole($guestRole);
$acl->addRole($editorRole, $guestRole);
$acl->addRole($adminRole, $editorRole);
$acl->addResource($articleResource);
$acl->allow($guestRole, $articleResource, 'show');
$acl->allow($editorRole, $articleResource, 'edit');
$acl->allow($adminRole, $articleResource, 'delete');

Debug::dump($adminRole, 'Admin role');

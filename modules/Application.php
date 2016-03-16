<?php
namespace Application;

use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\InitProviderInterface;
use Zend\ModuleManager\ModuleManagerInterface;

class Module implements
    BootstrapListenerInterface,
    InitProviderInterface
{
    public function init(ModuleManagerInterface $manager)
    {
        // add your code here
    }

    public function onBootstrap(EventInterface $e)
    {
        // add your code here
    }
}

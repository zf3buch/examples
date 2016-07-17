<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Pizza;

use Zend\Debug\Debug;
use Zend\EventManager\AbstractListenerAggregate;
use Zend\EventManager\EventInterface;
use Zend\EventManager\EventManagerInterface;

/**
 * Class PizzaListener
 *
 * @package Pizza
 */
class PizzaListener extends AbstractListenerAggregate
{
    /**
     * @param EventManagerInterface $events
     * @param int $priority
     */
    public function attach(EventManagerInterface $events, $priority = 1)
    {
        $this->listeners[] = $events->attach(
            'preSending', array($this, 'bakePizza'), 100
        );
        $this->listeners[] = $events->attach(
            'postSending', array($this, 'createInvoice'), 100
        );
        $this->listeners[] = $events->attach(
            'preSending', array($this, 'sendConfirmation'), 200
        );
    }

    /**
     * @param EventInterface $e
     */
    public function createInvoice(EventInterface $e)
    {
        Debug::dump(
            'Create invoice for pizza ' . $e->getParam('data')['id']
        );
    }

    /**
     * @param EventInterface $e
     */
    public function sendConfirmation(EventInterface $e)
    {
        Debug::dump(
            'Send confirmation for pizza ' . $e->getParam('data')['id']
        );
    }

    /**
     * @param EventInterface $e
     */
    public function bakePizza(EventInterface $e)
    {
        Debug::dump('Bake pizza "' . $e->getParam('data')['name'] . '"');
    }
}

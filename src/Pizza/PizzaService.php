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
use Zend\EventManager\EventManagerInterface;

/**
 * Class PizzaService
 *
 * @package Pizza
 */
class PizzaService
{
    /**
     * @var EventManagerInterface
     */
    private $eventManager;

    /**
     * @param EventManagerInterface $eventManager
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $this->eventManager = $eventManager;
    }

    /**
     * @param $data
     * @return bool
     */
    public function sendPizza($data)
    {
        $result = $this->eventManager->trigger(
            'preSending', __CLASS__, array('data' => $data)
        );

        if ($result->stopped()) {
            return false;
        }

        Debug::dump('Send pizza "' . $data['name'] . '"');

        $result = $this->eventManager->trigger(
            'postSending', __CLASS__, array('data' => $data)
        );

        if ($result->stopped()) {
            return false;
        }

        return true;
    }
}

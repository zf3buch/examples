<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Console;

use Zend\Console\Prompt\Confirm;
use Zend\Mvc\Console\Controller\AbstractConsoleController;

/**
 * Class ConsoleController
 *
 * @package Console
 */
class ConsoleController extends AbstractConsoleController
{
    /**
     * Create a new user
     */
    public function createAction()
    {
        $confirm = new Confirm('Are you sure to create user (y/n)?');
        $result  = $confirm->show();

        if ($result) {
            $email    = $this->params('email');
            $password = $this->params('password');

            // create the user
        }
    }
}

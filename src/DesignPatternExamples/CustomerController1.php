<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace DesignPatternExamples;

/**
 * Class CustomerController
 *
 * @package DesignPatternExamples
 */
class CustomerController
{
    /**
     * CustomerController1 constructor.
     */
    public function __construct()
    {
        $this->customerService = new CustomerService();
    }
}

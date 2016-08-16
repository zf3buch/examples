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
     * Set customer service
     *
     * @param CustomerService $customerService
     */
    public function setCustomerService(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }
}

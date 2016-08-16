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
class CustomerControllerFactory
{
    public function __invoke()
    {
        $customerService = new CustomerService();

        $customerController = new CustomerController();
        $customerController->setCustomerService($customerService);

        return $customerController;
    }
}

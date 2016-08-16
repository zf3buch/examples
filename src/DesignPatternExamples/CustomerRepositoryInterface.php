<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace DesignPatternExamples;

use Customer\CustomerEntity;

/**
 * Interface CustomerRepositoryInterface
 *
 * @package DesignPatternExamples
 */
interface CustomerRepositoryInterface
{
    /**
     * @param $id
     *
     * @return CustomerEntity|false
     */
    public function getCustomerById($id);

    /**
     * @return CustomerEntity[]
     */
    public function getAllCustomers();

    /**
     * @param CustomerEntity $customer
     *
     * @return bool
     */
    public function registerCustomer(CustomerEntity $customer);

    /**
     * @param CustomerEntity $customer
     *
     * @return bool
     */
    public function updateCustomer(CustomerEntity $customer);
}

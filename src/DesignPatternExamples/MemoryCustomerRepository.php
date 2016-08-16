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
 * Class MemoryCustomerRepository
 *
 * @package DesignPatternExamples
 */
class MemoryCustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @var CustomerEntity[]
     */
    private $customers = [];

    /**
     * @param $id
     *
     * @return CustomerEntity|false
     */
    public function getCustomerById($id)
    {
        if (isset($this->customers[$id])) {
            return $this->customers[$id];
        }

        return false;
    }

    /**
     * @return CustomerEntity[]
     */
    public function getAllCustomers()
    {
        return $this->customers;
    }

    /**
     * @param CustomerEntity $customer
     *
     * @return bool
     */
    public function registerCustomer(CustomerEntity $customer)
    {
        if (isset($this->customers[$customer->getId()])) {
            return false;
        }

        $this->customers[$customer->getId()] = $customer;

        return true;
    }

    /**
     * @param CustomerEntity $customer
     *
     * @return bool
     */
    public function updateCustomer(CustomerEntity $customer)
    {
        if (!isset($this->customers[$customer->getId()])) {
            return false;
        }

        $this->customers[$customer->getId()] = $customer;

        return true;
    }
}

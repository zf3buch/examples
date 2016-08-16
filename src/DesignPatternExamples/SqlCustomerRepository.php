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
use PDO;

/**
 * Class SqlCustomerRepository
 *
 * @package DesignPatternExamples
 */
class SqlCustomerRepository implements CustomerRepositoryInterface
{
    /**
     * @var PDO
     */
    private $pdo;

    /**
     * SqlCustomerRepository constructor.
     *
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * @param $id
     *
     * @return CustomerEntity|false
     */
    public function getCustomerById($id)
    {
        $sql = "SELECT * FROM customer WHERE ID = :id";

        $statement = $this->pdo->prepare($sql);
        $statement->execute(['id' => $id]);

        if ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            return CustomerEntity::createFromArray($row);
        }

        return false;
    }

    /**
     * @return CustomerEntity[]
     */
    public function getAllCustomers()
    {
        // to be implemented
    }

    /**
     * @param CustomerEntity $customer
     *
     * @return bool
     */
    public function registerCustomer(CustomerEntity $customer)
    {
        $sql = 'INSERT INTO posts (id, full_name, address) ';
        $sql .= 'VALUES (:id, :full_name, :address)';

        $statement = $this->pdo->prepare($sql);
        $statement->execute([
            'id' => $customer->getId(),
            'full_name' => $customer->getFullName(),
            'address' => $customer->getAddress(),
        ]);

        return true;
    }

    /**
     * @param CustomerEntity $customer
     *
     * @return bool
     */
    public function updateCustomer(CustomerEntity $customer)
    {
        // to be implemented
    }
}

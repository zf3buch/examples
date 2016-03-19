<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Customer;

/**
 * Class CustomerEntity
 *
 * @package Customer
 */
class CustomerEntity
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $fullName;

    /**
     * @var array
     */
    private $address;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return array
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param array $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }
}

<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Customer;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class CustomerServiceFactory
 *
 * @package Customer
 */
class CustomerServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string $requestedName
     * @param array|null $options
     *
     * @return CustomerService
     */
    public function __invoke(
        ContainerInterface $container, $requestedName,
        array $options = null
    ) {
        /** @var CustomerForm $customerForm */
        $customerForm = $container->get(CustomerForm::class);

        return new CustomerService($customerForm);
    }

}
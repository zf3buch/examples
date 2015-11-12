<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Customer;

use Customer\Service as CustomerService;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Class ServiceFactory
 *
 * @package Customer
 */
class ServiceFactory implements FactoryInterface
{
    /**
     * @param ContainerInterface $container
     * @param string             $requestedName
     * @param array|null         $options
     *
     * @return Service
     */
    public function __invoke(
        ContainerInterface $container, $requestedName,
        array $options = null
    ) {
        /** @var Form $customerForm */
        $customerForm = $container->get(Form::class);

        return new CustomerService($customerForm);
    }

}
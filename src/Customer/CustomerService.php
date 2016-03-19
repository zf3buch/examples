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
 * Class CustomerService
 *
 * @package Customer
 */
class CustomerService
{
    /**
     * @var CustomerForm
     */
    private $form;

    /**
     * Service constructor.
     *
     * @param CustomerForm $form
     */
    public function __construct(CustomerForm $form)
    {
        $this->form = $form;
    }
}
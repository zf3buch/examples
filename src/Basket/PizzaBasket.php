<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Basket;

use DomainException;

/**
 * Class PizzaBasket
 *
 * @package Basket
 */
class PizzaBasket implements PizzaBasketInterface
{
    /**
     * @var array
     */
    private $list = [];

    /**
     * @param $id
     * @param $name
     */
    public function addPizza($id, $name)
    {
        if (isset($this->list[$id])) {
            throw new DomainException(
                'Pizza ' . $id . ' already added'
            );
        }

        $this->list[$id] = $name;
    }

    /**
     * @return int
     */
    public function countPizzas()
    {
        return count($this->list);
    }

    /**
     * @return array
     */
    public function getPizzas()
    {
        return $this->list;
    }
}

<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace Basket;

/**
 * Interface PizzaBasketInterface
 *
 * @package Basket
 */
interface PizzaBasketInterface
{
    /**
     * @param $id
     * @param $name
     */
    public function addPizza($id, $name);

    /**
     * @return int
     */
    public function countPizzas();

    /**
     * @return array
     */
    public function getPizzas();
}

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
 * Interface BasketService
 *
 * @package Basket
 */
interface BasketServiceInterface
{
    /**
     * @param array $pizzaData
     */
    public function addPizzaToBasket(array $pizzaData = []);

    /**
     * @return array
     */
    public function getPizzas();
}

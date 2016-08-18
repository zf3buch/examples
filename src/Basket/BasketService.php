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
 * Class BasketService
 *
 * @package Basket
 */
class BasketService implements BasketServiceInterface
{
    /**
     * @var PizzaBasketInterface
     */
    private $pizzaBasket;

    /**
     * BasketService constructor.
     *
     * @param PizzaBasketInterface $pizzaBasket
     */
    public function __construct(PizzaBasketInterface $pizzaBasket)
    {
        $this->pizzaBasket = $pizzaBasket;
    }

    /**
     * @param array $pizzaData
     */
    public function addPizzaToBasket(array $pizzaData = [])
    {
        $this->pizzaBasket->addPizza($pizzaData['id'], $pizzaData['name']);
    }

    /**
     * @return array
     */
    public function getPizzas()
    {
        return $this->pizzaBasket->getPizzas();
    }
}

<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace BasketTest;

use Basket\PizzaBasket;
use DomainException;
use PHPUnit_Framework_TestCase;

/**
 * Class PizzaBasketTest
 *
 * @package Basket
 */
class PizzaBasketTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var PizzaBasket
     */
    private $pizzaBasket;
    
    protected function setUp()
    {
        $this->pizzaBasket = new PizzaBasket();
    }

    public function testClassExists()
    {
        $this->assertTrue(class_exists(PizzaBasket::class));
    }

    public function testInitialCount()
    {
        $this->assertEquals(0, $this->pizzaBasket->countPizzas());
        $this->assertEquals([], $this->pizzaBasket->getPizzas());
    }

    public function testAddThreePizzas()
    {
        $this->pizzaBasket->addPizza(1, 'Pizza Mista');
        $this->pizzaBasket->addPizza(2, 'Pizza Salami');
        $this->pizzaBasket->addPizza(3, 'Pizza Garbage');

        $expectedPizzas = [
            1 => 'Pizza Mista',
            2 => 'Pizza Salami',
            3 => 'Pizza Garbage',
        ];

        $this->assertEquals(3, $this->pizzaBasket->countPizzas());
        $this->assertEquals(
            $expectedPizzas, $this->pizzaBasket->getPizzas()
        );
    }

    /**
     * @dataProvider providePizzas
     */
    public function testAddPizzasWithDataProvider($id, $name)
    {
        $this->pizzaBasket->addPizza($id, $name);

        $this->assertEquals(1, $this->pizzaBasket->countPizzas());
    }

    public function providePizzas()
    {
        return [
            [1, 'Pizza Mista'],
            [2, 'Pizza Salami'],
            [3, 'Pizza Garbage'],
        ];
    }

    public function testAddSamePizzaTwice()
    {
        $this->expectException(DomainException::class);
        $this->expectExceptionMessage('Pizza 1 already added');

        $this->pizzaBasket->addPizza(1, 'Pizza Mista');
        $this->pizzaBasket->addPizza(1, 'Pizza Mista');
    }
}

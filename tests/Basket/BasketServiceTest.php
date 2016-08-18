<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace BasketTest;

use Basket\BasketService;
use Basket\BasketServiceInterface;
use Basket\PizzaBasketInterface;
use DomainException;
use PHPUnit_Framework_TestCase;
use Pizza\PizzaService;
use Prophecy\Prophecy\ObjectProphecy;

/**
 * Class BasketServiceTest
 *
 * @package Basket
 */
class BasketServiceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var BasketServiceInterface
     */
    private $basketService;

    /**
     * @var PizzaBasketInterface|ObjectProphecy
     */
    private $pizzaBasket;

    protected function setUp()
    {
        $this->pizzaBasket = $this->prophesize(
            PizzaBasketInterface::class
        );

        $this->basketService = new BasketService($this->pizzaBasket->reveal());
    }

    public function testClassExists()
    {
        $this->assertTrue(class_exists(BasketService::class));
    }

    public function testInitialPizzas()
    {
        $this->pizzaBasket->getPizzas()->willReturn([])->shouldBeCalled();

        $this->assertEquals([], $this->basketService->getPizzas());
    }

    public function testAddThreePizzas()
    {
        $pizza1 = ['id' => 1, 'name' => 'Pizza Mista'];
        $pizza2 = ['id' => 2, 'name' => 'Pizza Salami'];
        $pizza3 = ['id' => 3, 'name' => 'Pizza Garbage'];

        $expectedPizzas = [
            1 => 'Pizza Mista',
            2 => 'Pizza Salami',
            3 => 'Pizza Garbage',
        ];

        $this->pizzaBasket->addPizza(1, 'Pizza Mista')->shouldBeCalled();
        $this->pizzaBasket->addPizza(2, 'Pizza Salami')->shouldBeCalled();
        $this->pizzaBasket->addPizza(3, 'Pizza Garbage')->shouldBeCalled();

        $this->pizzaBasket->addPizza(1, 'Pizza Salami')
            ->shouldNotBeCalled();
        $this->pizzaBasket->addPizza(2, 'Pizza Garbage')
            ->shouldNotBeCalled();
        $this->pizzaBasket->addPizza(3, 'Pizza Mista')
            ->shouldNotBeCalled();

        $this->basketService->addPizzaToBasket($pizza1);
        $this->basketService->addPizzaToBasket($pizza2);
        $this->basketService->addPizzaToBasket($pizza3);

        $this->pizzaBasket->getPizzas()->willReturn($expectedPizzas)
            ->shouldBeCalled();

        $this->assertEquals(
            $expectedPizzas, $this->basketService->getPizzas()
        );
    }
}

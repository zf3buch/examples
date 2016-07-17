<?php
/**
 * ZF3 book examples
 *
 * @author     Ralf Eggert <ralf@travello.de>
 * @link       https://github.com/zf3buch/examples
 * @license    http://opensource.org/licenses/MIT The MIT License (MIT)
 */

namespace ControllerTest;


use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * Class IndexControllerTest
 * @package ControllerTest
 */
class IndexControllerTest extends AbstractHttpControllerTestCase
{
    /**
     * Setup all test cases
     */
    public function setUp()
    {
        $this->setApplicationConfig(
            include APPLICATION_ROOT . '/config/test.config.php'
        );
        parent::setUp();
    }

    /**
     * Test if index action can be accessed
     */
    public function testIndexActionCanBeAccessed()
    {
        $this->dispatch('/');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('application');
        $this->assertControllerName('application_index');
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('home');
    }
}

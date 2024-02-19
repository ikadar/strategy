<?php
namespace Tests;

use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use TestStrategyFactory;

class StrategyFactoryTest extends TestCase
{

    /**
     * @throws Exception
     */
    public function testStrategyFactory()
    {

        $testStrategy1Command1 = new Mocks\TestStrategy1\TestCommand1();
        $testStrategy1Command2 = new Mocks\TestStrategy1\TestCommand2();

        $testStrategy2Command1 = new Mocks\TestStrategy2\TestCommand1();

        $strategy1 = new \Tests\Mocks\TestStrategy1\Strategy(
            $testStrategy1Command1,
            $testStrategy1Command2
        );

        $strategy2 = new \Tests\Mocks\TestStrategy2\Strategy(
            $testStrategy2Command1,
        );

        $strategy3 = new \Tests\Mocks\TestStrategy3\Strategy(
        );

        $strategyFactory = new Mocks\TestStrategyFactory(
            $strategy1,
            $strategy2,
            $strategy3,
        );

        // test getStrategies method

        $strategies = $strategyFactory->getStrategies();
        $this->assertCount(3, $strategies);

        // TestCommand1
        $this->assertEquals(
            "Tests\Mocks\TestStrategy1\TestCommand1",
            $strategies[0]->getCommandByName("TestCommand1")::class
        );

        $this->assertEquals(
            "Tests\Mocks\TestStrategy2\TestCommand1",
            $strategies[1]->getCommandByName("TestCommand1")::class
        );

        $this->assertEquals(
            null,
            $strategies[2]->getCommandByName("TestCommand1")
        );


        // TestCommand2
        $this->assertEquals(
            "Tests\Mocks\TestStrategy1\TestCommand2",
            $strategies[0]->getCommandByName("TestCommand2")::class
        );

        $this->assertEquals(
            null,
            $strategies[1]->getCommandByName("TestCommand2")
        );

        $this->assertEquals(
            null,
            $strategies[2]->getCommandByName("TestCommand2")
        );


        // TestCommand3
        $this->assertEquals(
            null,
            $strategies[0]->getCommandByName("TestCommand3")
        );

        $this->assertEquals(
            null,
            $strategies[1]->getCommandByName("TestCommand3")
        );

        $this->assertEquals(
            null,
            $strategies[2]->getCommandByName("TestCommand3")
        );

        // test getStrategiesForCommand method for TestCommand1
        $strategies = $strategyFactory->getStrategiesForCommand("TestCommand1");
        $this->assertCount(2, $strategies);

        $this->assertEquals(
            "Tests\Mocks\TestStrategy1\TestCommand1",
            $strategies[0]->getCommandByName("TestCommand1")::class
        );

        $this->assertEquals(
            "Tests\Mocks\TestStrategy2\TestCommand1",
            $strategies[1]->getCommandByName("TestCommand1")::class
        );

        // test getStrategiesForCommand method for TestCommand2
        $strategies = $strategyFactory->getStrategiesForCommand("TestCommand2");
        $this->assertCount(1, $strategies);

        $this->assertEquals(
            "Tests\Mocks\TestStrategy1\TestCommand2",
            $strategies[0]->getCommandByName("TestCommand2")::class
        );

        // test getStrategiesForCommand method for TestCommand3
        $strategies = $strategyFactory->getStrategiesForCommand("TestCommand3");
        $this->assertCount(0, $strategies);

    }
}

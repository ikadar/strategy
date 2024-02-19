<?php
namespace Tests;

use IKadar\Strategy\ParameterBag;
use IKadar\Strategy\StrategyFactoryInterface;
use IKadar\Strategy\StrategyRunner;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Tests\Mocks\TestStrategy1\Strategy as Strategy1;
use Tests\Mocks\TestStrategy2\Strategy as Strategy2;
use Tests\Mocks\TestStrategy3\Strategy as Strategy3;

class StrategyRunnerTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testStrategyRunner()
    {

        $testStrategy1Command1 = new Mocks\TestStrategy1\TestCommand1();
        $testStrategy1Command2 = new Mocks\TestStrategy1\TestCommand2();

        $testStrategy2Command1 = new Mocks\TestStrategy2\TestCommand1();

        $testStrategy1 = new Strategy1($testStrategy1Command1, $testStrategy1Command2);
        $testStrategy2 = new Strategy2($testStrategy2Command1);
        $testStrategy3 = new Strategy3();

        $parameterBag = new ParameterBag([
            "a" => "A",
            "b" => "B"
        ]);

        $strategyFactoryMock = $this->createMock(StrategyFactoryInterface::class);
        $strategyFactoryMock->method('getStrategiesForCommand')->willReturnMap([
            ["TestCommand1", [$testStrategy1, $testStrategy2]],
            ["TestCommand2", [$testStrategy1]],
            ["TestCommand3", []],
        ]);

        $strategyRunner = new StrategyRunner($strategyFactoryMock);

        list($a, $b) = $strategyRunner->execute(
            commandName: "TestCommand1",
            parameter: $parameterBag
        );

        $this->assertEquals("A - TestStrategy1/TestCommand1 - TestStrategy2/TestCommand1", $a);
        $this->assertEquals("B", $b);

        list($a, $b) = $strategyRunner->execute(
            commandName: "TestCommand2",
            parameter: $parameterBag
        );

        $this->assertEquals("A - TestStrategy1/TestCommand1 - TestStrategy2/TestCommand1 - TestStrategy1/TestCommand2", $a);
        $this->assertEquals("B", $b);

    }
}

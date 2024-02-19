<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use Tests\Mocks\TestCommand1;
use Tests\Mocks\TestCommand2;
use Tests\Mocks\TestStrategy1\Strategy as Strategy1;
use Tests\Mocks\TestStrategy2\Strategy as Strategy2;
use Tests\Mocks\TestStrategy3\Strategy as Strategy3;

class StrategyTest extends TestCase
{
    /**
     */
    public function testStrategyRunner()
    {

        $testStrategy1Command1 = new Mocks\TestStrategy1\TestCommand1();
        $testStrategy1Command2 = new Mocks\TestStrategy1\TestCommand2();

        $testStrategy2Command1 = new Mocks\TestStrategy2\TestCommand1();

        $testStrategy1 = new Strategy1($testStrategy1Command1, $testStrategy1Command2);
        $testStrategy2 = new Strategy2($testStrategy2Command1);
        $testStrategy3 = new Strategy3();

        // TestStrategy1
        $this->assertEquals(
            "Tests\Mocks\TestStrategy1\TestCommand1",
            $testStrategy1->getCommandByName("TestCommand1")::class
        );

        $this->assertEquals(
            "Tests\Mocks\TestStrategy1\TestCommand2",
            $testStrategy1->getCommandByName("TestCommand2")::class
        );

        $this->assertEquals(
            null,
            $testStrategy1->getCommandByName("TestCommand3")
        );

        // TestStrategy2
        $this->assertEquals(
            "Tests\Mocks\TestStrategy2\TestCommand1",
            $testStrategy2->getCommandByName("TestCommand1")::class
        );

        $this->assertEquals(
            null,
            $testStrategy2->getCommandByName("TestCommand2")
        );

        $this->assertEquals(
            null,
            $testStrategy2->getCommandByName("TestCommand3")
        );

        // TestStrategy3
        $this->assertEquals(
            null,
            $testStrategy3->getCommandByName("TestCommand1")
        );

        $this->assertEquals(
            null,
            $testStrategy3->getCommandByName("TestCommand2")
        );

        $this->assertEquals(
            null,
            $testStrategy3->getCommandByName("TestCommand3")
        );



    }
}

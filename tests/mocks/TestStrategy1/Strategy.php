<?php
namespace Tests\Mocks\TestStrategy1;

use IKadar\Strategy\StrategyInterface;

class Strategy extends \IKadar\Strategy\Strategy implements StrategyInterface
{
    public function __construct(
        protected TestCommand1 $testCommand1,
        protected TestCommand2 $testCommand2,
    )
    {
        parent::__construct();
    }

}

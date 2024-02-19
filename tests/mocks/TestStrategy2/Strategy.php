<?php
namespace Tests\Mocks\TestStrategy2;

use IKadar\Strategy\StrategyInterface;

class Strategy extends \IKadar\Strategy\Strategy implements StrategyInterface
{
    public function __construct(
        protected TestCommand1 $testCommand1
    )
    {
        parent::__construct();
    }

}

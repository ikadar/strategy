<?php

namespace Tests\Mocks;

use IKadar\Strategy\StrategyFactory;
use IKadar\Strategy\StrategyFactoryInterface;
use IKadar\Strategy\StrategyInterface;

class TestStrategyFactory extends StrategyFactory implements StrategyFactoryInterface
{
    public function __construct(
        protected StrategyInterface $strategy1,
        protected StrategyInterface $strategy2,
        protected StrategyInterface $strategy3,
    )
    {
        parent::__construct();
    }

}

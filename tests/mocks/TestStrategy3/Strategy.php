<?php
namespace Tests\Mocks\TestStrategy3;

use IKadar\Strategy\StrategyInterface;

class Strategy extends \IKadar\Strategy\Strategy implements StrategyInterface
{
    public function __construct(
    )
    {
        parent::__construct();
    }
}

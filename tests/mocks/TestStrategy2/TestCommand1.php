<?php
namespace Tests\Mocks\TestStrategy2;

use IKadar\Strategy\Command;
use IKadar\Strategy\CommandInterface;
use IKadar\Strategy\ParameterBag;

class TestCommand1 extends Command implements CommandInterface
{

    public function execute(): ParameterBag
    {
        $a = $this->getParameter()->getItem("a");
        $a .= " - TestStrategy2/TestCommand1";
        $this->getParameter()->setItem("a", $a);
        return $this->getParameter();
    }
}

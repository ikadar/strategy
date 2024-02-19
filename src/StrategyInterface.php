<?php

namespace IKadar\Strategy;

interface StrategyInterface
{
    public function getCommandByName(string $commandName): ?CommandInterface;
}

<?php

namespace IKadar\Strategy;

interface StrategyFactoryInterface
{
    /**
     * @return StrategyInterface[]
     */
    public function getStrategies(): array;

    /**
     * @param string $commandName
     * @return StrategyInterface[]
     */
    public function getStrategiesForCommand(string $commandName): array;
}

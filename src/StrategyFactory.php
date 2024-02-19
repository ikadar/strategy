<?php

namespace IKadar\Strategy;

abstract class StrategyFactory implements StrategyFactoryInterface
{
    /**
     * @var StrategyInterface[]
     */
    protected array $strategies = [];

    public function __construct(
    )
    {
        foreach (get_object_vars($this) as $loop => $objectVar) {
            if ($objectVar instanceof StrategyInterface) {
                $this->strategies[] = $objectVar;
            }
        }
    }

    /**
     * @return StrategyInterface[]
     */
    final public function getStrategies(): array
    {
        return $this->strategies;
    }

    final public function getStrategiesForCommand(string $commandName): array
    {
        $strategies = [];
        foreach ($this->getStrategies() as $strategy) {
            if ($strategy->getCommandByName($commandName) !== null) {
                $strategies[] = $strategy;
            }
        }

        return $strategies;
    }
}

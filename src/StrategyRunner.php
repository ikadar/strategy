<?php

namespace IKadar\Strategy;

class StrategyRunner implements StrategyRunnerInterface
{
    public function __construct(
        protected StrategyFactoryInterface $strategyFactory
    )
    {
    }

    /**
     * @param string $commandName
     * @param ParameterBag $parameter
     * @return array
     */
    final public function execute(string $commandName, ParameterBag $parameter): array
    {
        $strategies = $this->strategyFactory->getStrategiesForCommand($commandName);

        foreach ($strategies as $strategy) {
            $command = $strategy->getCommandByName($commandName);
            if ($command === null) {
                continue;
            }
            $command->setParameter($parameter);
            $parameter = $command->execute();
        }

        return $parameter->getValues();
    }

}

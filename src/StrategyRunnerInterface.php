<?php

namespace IKadar\Strategy;

interface StrategyRunnerInterface
{
    /**
     * @param string $commandName
     * @param ParameterBag $parameter
     * @return array
     */
    public function execute(string $commandName, ParameterBag $parameter): array;
}

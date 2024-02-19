<?php

namespace IKadar\Strategy;

class Strategy implements StrategyInterface
{
    protected array $commands = [];

    public function __construct()
    {
        foreach (get_object_vars($this) as $objectVar) {
            if ($objectVar instanceof Command) {
                $this->commands[basename(str_replace('\\', '/', $objectVar::class))] = $objectVar;
            }
        }
    }

    final public function getCommandByName(string $commandName): ?CommandInterface
    {
        if (array_key_exists($commandName, $this->commands)) {
            return $this->commands[$commandName];
        }

        return null;
    }
}

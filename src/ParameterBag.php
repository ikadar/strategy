<?php

namespace IKadar\Strategy;

final class ParameterBag implements ParameterBagInterface
{
    protected array $items;

    public function __construct(?array $items)
    {
        $this->items = [];
        $this->setItems($items);
    }

    public function setItem(string $key, mixed $value)
    {
        $this->items[$key] = $value;
    }

    public function getItem(string $key): mixed
    {
        return $this->items[$key];
    }

    public function setItems(array $items)
    {
        foreach ($items as $key => $value) {
            $this->setItem($key, $value);
        }
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getValues(): array
    {
        return array_values($this->items);
    }

}

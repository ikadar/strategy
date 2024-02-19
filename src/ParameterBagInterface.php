<?php

namespace IKadar\Strategy;

interface ParameterBagInterface
{
    public function __construct(?array $items);

    public function setItem(string $key, mixed $value);

    public function getItem(string $key): mixed;

    public function setItems(array $items);

    public function getItems(): array;

    public function getValues(): array;
}

<?php

namespace learning\Patterns\ServiceLocator\Example2;

interface ServiceLocatorInterface
{
    public function set(string $name, $service): ServiceLocatorInterface;
    public function get(string $name);
    public function has(string $name): bool;
    public function remove(string $name): ServiceLocatorInterface;
    public function clear(): ServiceLocatorInterface;
}

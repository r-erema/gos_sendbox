<?php

declare(strict_types=1);

namespace learning\Patterns\Multiton\Example1;

final class Multiton
{
    private static $instances = [];
    private function __construct()
    {}

    public static function getInstance(string $instanceName): Multiton
    {
        if (!isset(self::$instances[$instanceName])) {
            self::$instances[$instanceName] = new self();
        }
        return self::$instances[$instanceName];
    }
    private function __clone()
    {}
    private function __wakeup()
    {}
}
$instance1 = Multiton::getInstance('1');
$instance2 = Multiton::getInstance('2');

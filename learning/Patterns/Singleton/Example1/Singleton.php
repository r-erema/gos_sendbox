<?php

declare(strict_types=1);

namespace learning\Patterns\Singleton\Example1;

final class Singleton
{

    private static $instance;

    public static function getInstance(): Singleton
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    private function __construct()
    {
    }

    private function __clone()
    {
    }

}
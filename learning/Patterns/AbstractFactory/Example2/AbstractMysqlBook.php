<?php

declare(strict_types=1);

namespace learning\Patterns\AbstractFactory\Example2;

abstract class AbstractMysqlBook extends AbstractBook
{
    protected $subject = 'MySQL';
}
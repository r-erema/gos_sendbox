<?php

declare(strict_types=1);

namespace learning\Patterns\AbstractFactory\Example2;

abstract class AbstractBookFactory
{
    abstract public function makePhpBook(): AbstractPhpBook;
    abstract public function makeMysqlBook(): AbstractMysqlBook;
}
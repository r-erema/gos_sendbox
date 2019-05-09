<?php

declare(strict_types=1);

namespace learning\Patterns\AbstractFactory\Example2;

class OReillyBookFactory extends AbstractBookFactory
{
    private $context = 'OReilly';

    public function makePhpBook(): AbstractPhpBook
    {
        return new OReillyPhpBook();
    }

    public function makeMysqlBook(): AbstractMysqlBook
    {
        return new OReillyMySQLBook();
    }
}

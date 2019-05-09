<?php

declare(strict_types=1);

namespace learning\Patterns\AbstractFactory\Example2;

class SamsBookFactory extends AbstractBookFactory
{
    private $context = 'OReilly';

    public function makePhpBook(): AbstractPhpBook
    {
        return new SamsPHPBook();
    }

    public function makeMysqlBook(): AbstractMysqlBook
    {
        return new SamsMySQLBook();
    }
}

<?php

declare(strict_types=1);

namespace learning\Patterns\FluentInterface\Example1;

class Sql
{

    private $fields = [];
    private $from = [];
    private $where = [];

    public function select(array $fields): self
    {
        $this->fields = $fields;
        return $this;
    }

    public function from(string $table, string $alias): self
    {
        $this->from[] = "{$table} AS {$alias}";
        return $this;
    }

    public function where(string $condition): self
    {
        $this->where[] = $condition;
        return $this;
    }

    public function __toString(): string
    {
        return sprintf(
            'SELECT %s FROM %s WHERE %s',
            implode(', ', $this->fields),
            implode(', ', $this->from),
            implode(' AND ', $this->where),
        );
    }
}
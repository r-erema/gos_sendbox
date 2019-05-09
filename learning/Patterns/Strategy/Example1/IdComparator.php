<?php

declare(strict_types=1);

namespace learning\Patterns\Strategy\Example1;

class IdComparator implements ComparatorInterface
{

    /**
     * @param array $a
     * @param array $b
     * @return int
     * @throws \Exception
     */
    public function compare(array $a, array $b): int
    {
        return $a['id'] <=> $b['id'];
    }
}

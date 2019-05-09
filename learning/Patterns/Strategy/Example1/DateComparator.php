<?php

declare(strict_types=1);

namespace learning\Patterns\Strategy\Example1;

class DateComparator implements ComparatorInterface
{

    /**
     * @param array $a
     * @param array $b
     * @return int
     * @throws \Exception
     */
    public function compare(array $a, array $b): int
    {
        $aDate = new \DateTimeImmutable($a['date']);
        $bDate = new \DateTimeImmutable($b['date']);
        return $aDate <=> $bDate;
    }
}

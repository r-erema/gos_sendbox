<?php

class NumberFilter extends FilterIterator {

    const FILTER_EVEN = 1;
    const FILTER_ODD = 2;

    private $type;

    /**
     * NumberFilter constructor.
     * @param Iterator $iterator
     * @param int $odd_or_even
     */
    public function __construct(Iterator $iterator, int $odd_or_even = self::FILTER_EVEN) {
        $this->type = $odd_or_even;
        parent::__construct($iterator);
    }


    /**
     * @return bool
     */
    public function accept() {
        if ($this->type === self::FILTER_EVEN) {
            return $this->current() % 2 == 0;
        } else {
            return $this->current() % 2 == 1;
        }
    }
}

$numbers = new ArrayObject(range(0,10));
$numbersIterator = new ArrayIterator($numbers);

$iterator = new NumberFilter($numbersIterator, NumberFilter::FILTER_ODD);

foreach ($iterator as $number) {
    echo $number . PHP_EOL;
}
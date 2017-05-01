<?php

class myIterator implements SeekableIterator {

    /**
     * @var array
     */
    private $data = [];

    /**
     * @var int
     */
    private $current = 0;

    /**
     * myIterator constructor.
     * @param array $data
     */
    public function __construct(array $data) {
        $this->data = $data;
    }

    public function current() {
        return $this->data[$this->current];
    }

    public function next() {
        $this->current++;
    }

    /**
     * @return int
     */
    public function key() {
        return $this->current;
    }

    /**
     * @return bool
     */
    public function valid() {
        return array_key_exists($this->current, $this->data);
    }

    public function rewind() {
        $this->current = 0;
    }

    /**
     * @param int $position
     * @return mixed
     */
    public function seek($position) {
        $this->current = $position;
    }
}
$iterator = new myIterator([1,2,3,4,5,6,7,8,9,10]);
$iterator->seek(3);
echo $iterator->current();
foreach ($iterator as $key => $value) {
    echo "{$key} : {$value}" . PHP_EOL;
}
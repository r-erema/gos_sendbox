<?php

class myRecursiveIterator implements RecursiveIterator {

    /**
     * @return bool
     */
    public function hasChildren() {
        return is_array($this->data[$this->current]);
    }

    public function getChildren() {
        //return new self($this->data[$this->current]);
        return $this->data[$this->current];
        //print_r($this->data[$this->current]);
    }

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
        return true;
    }

    public function rewind() {
        $this->current = 0;
    }

}

$iterator = new myRecursiveIterator([1,1 => [10, 20], 3, 4, 4 => [7,7 => [80]],6,7,8,9,10]);
foreach ($iterator as $key => $value) {
    if ($iterator->hasChildren()) {
        echo "{$key} has children: " . PHP_EOL;
        $iterator->getChildren();
    } else {
        echo "{$key} : {$value}" . PHP_EOL;
    }
}
<?php

class myData implements Iterator {

    /**
     * @var array
     */
    private $myData = [
        'foo',
        'bar',
        'baz',
        'bat',
    ];

    /**
     * @var int
     */
    private $current = 0;

    public function current() {
        $this->myData[$this->current];
    }

    public function next() {
        $this->current++;
    }

    public function key() {
       return $this->current;
    }

    public function valid() {
        return array_key_exists($this->current, $this->myData);
    }

    public function rewind() {
        $this->current = 0;
    }

}

$md = new myData();
foreach ($md as $key => $item) {
    $item = $item;
}
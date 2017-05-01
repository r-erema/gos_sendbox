<?php

class myClass implements ArrayAccess {

    /**
     * @var array
     */
    protected $array = [];

    /**
     * @param mixed $offset
     * @param mixed $value
     * @throws Exception
     */
    public function offsetSet($offset, $value) {
        if (!is_numeric($offset)) {
            throw new Exception("Invalid key {$offset}");
        }
        $this->array[$offset] = $value;
    }

    /**
     * @param mixed $offset
     * @return mixed
     */
    public function offsetGet($offset) {
        return $this->array[$offset];
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset) {
        unset($this->array[$offset]);
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset) {
        return array_key_exists($this->array, $offset);
    }

}

$mc = new myClass();
$mc[1] = 2;
$mc[2] = 22;
$mc[3] = 222;

foreach ($mc as $item) {
    echo $item;
}
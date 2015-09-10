<?php

class Product {

    public $name;
    public $price;

    /**
     * Product constructor.
     * @param $name
     * @param $price
     */
    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

}
<?php

namespace Prototype;

class Factory {
    /**
     * @var Product
     */
    private $product;

    /**
     * Factory constructor.
     * @param $product
     */
    public function __construct(Product $product) {
        $this->product = $product;
    }

    /**
     * @return Product
     */
    public function getProduct() {
        return clone $this->product;
    }

}
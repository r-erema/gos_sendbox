<?php

namespace Builder;

abstract class Builder {

    /**
     * @var Product
     */
    protected $product;

    /**
     * @return Product
     */
    final public function getProduct() {
        return $this->product;
    }

    public function buildProduct() {
        $this->product = new Product();
    }

}
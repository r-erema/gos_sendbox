<?php

namespace Builder;

class Factory {

    /**
     * @var Builder
     */
    private $builder;

    /**
     * Factory constructor.
     * @param Builder $builder
     */
    public function __construct(Builder $builder) {
        $this->builder = $builder;
        $this->builder->buildProduct();
    }

    /**
     * @return Product
     */
    public function getProduct() {
        return $this->builder->getProduct();
    }

}
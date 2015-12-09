<?php

namespace LazyInitialization;

class Factory {

    /**
     * @var Product
     */
    protected $firstProduct;

    /**
     * @var Product
     */
    protected $secondProduct;

    /**
     * @return FirstProduct|Product
     */
    public function getFirstProduct() {
        if (!$this->firstProduct) {
            $this->firstProduct = new FirstProduct();
        }
        return $this->firstProduct;
    }

    /**
     * @return Product|secondProduct
     */
    public function getSecondProduct() {
        if (!$this->secondProduct) {
            $this->secondProduct = new SecondProduct();
        }
        return $this->secondProduct;
    }

}
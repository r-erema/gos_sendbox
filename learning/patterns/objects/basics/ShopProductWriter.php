<?php
abstract class ShopProductWriter {

    /**
     * @var ShopProduct[]
     */
    protected $products = array();

    public function addProduct(ShopProduct $shopProduct) {
        $this->products[] = $shopProduct;
    }

    abstract public function write();

}
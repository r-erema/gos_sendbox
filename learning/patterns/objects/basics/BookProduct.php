<?php

class BookProduct extends ShopProduct {

    private $numPages;

    public function __construct($title, $mainName, $firstName, $priceOfProduct, $pages) {
        parent::__construct($title, $mainName, $firstName, $priceOfProduct);
        $this->numPages = $pages;
    }

    public function getNumberOfPages() {
        return $this->numPages;
    }

    public function getSummaryLine() {
        return  parent::getSummaryLine().": $this->numPages str.\n";
    }


}
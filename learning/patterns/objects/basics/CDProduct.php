<?php
class CDProduct extends ShopProduct{

    private $playLength;
    const DISCOUNT = 1.21;

    public function __construct($title, $mainName, $firstName, $priceOfProduct, $length) {
        parent::__construct($title, $mainName, $firstName, $priceOfProduct);
        $this->playLength = $length;
        $this->setDiscount(self::DISCOUNT);
    }

    public function getPlayLength() {
        return $this->playLength;
    }

    public function getSummaryLine() {
        return parent::getSummaryLine().": Vremya zvuchniya - $this->playLength min\n";
    }
}
<?php

class TextProductWriter extends ShopProductWriter {
    public function write() {
        $str = "TOVARI:\n";
        foreach($this->products as $shopProduct) {
            $str .= $shopProduct->getSummaryLine() . "\n";
        }
        print $str;
    }
}
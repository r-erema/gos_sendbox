<?php
class XmlProductWriter extends ShopProductWriter {
    public function write() {
        $str = '<xml vaersion="1.0" encoding="UTF-8"?>' . "\n";
        $str = "<products>\n";

        foreach($this->products as $shopProduct) {
            $str .= "\t<product title=\"{$shopProduct->getTitle()}\">\n";
            $str .= "\t\t<summary>\n";
            $str .= "\t\t\t{$shopProduct->getSummaryLine()}";
            $str .= "\t\t</summary>\n";
            $str .= "\t</product>\n";
        }
        $str .= "</products>\n";
        print $str;
    }
}
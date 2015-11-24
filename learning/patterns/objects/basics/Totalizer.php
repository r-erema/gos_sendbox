<?php

class Totalizer {

    public static function warnAccount($amt) {
        $count = 0;
        return function (Product $product) use ($amt, &$count) {
            $count += $product->price;
            print 'Сумма ' . $count . "\n";
            if($count > $amt) {
                print  "Продано товаров на сумму: $count\n";
            }
        };
    }
}
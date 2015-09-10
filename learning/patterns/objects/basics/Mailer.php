<?php

class Mailer {

    /**
     * @param Product $product
     */
    public function doMail(Product $product) {
        print "Упаковываем $product->name\n";
    }

}
<?php

namespace Builder;

class SecondBuilder extends Builder {

    public function buildProduct() {
        parent::buildProduct();
        $this->product->setName('The product of second builder');
    }

}
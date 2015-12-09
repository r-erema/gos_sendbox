<?php

namespace Factory;

class SecondFactory implements Factory{
    public function getProduct() {
        return new SecondProduct();
    }
}
<?php

namespace AbstractFactory;

class SecondFactory extends AbstractFactory{
    public function getProduct() {
        return new SecondProduct();
    }
}
<?php

namespace AbstractFactory;

class FirstFactory extends AbstractFactory {
    public function getProduct() {
        return new FirstProduct();
    }
}
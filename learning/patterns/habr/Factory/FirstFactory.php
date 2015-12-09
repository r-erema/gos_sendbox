<?php

namespace Factory;

class FirstFactory implements Factory{
    public function getProduct() {
        return new FirstProduct();
    }
}
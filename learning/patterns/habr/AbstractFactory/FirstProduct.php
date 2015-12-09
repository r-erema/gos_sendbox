<?php

namespace AbstractFactory;

class FirstProduct implements Product {
    public function getName() {
        return 'The product from the first factory';
    }
}
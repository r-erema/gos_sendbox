<?php

namespace AbstractFactory;

class SecondProduct implements Product {
    public function getName() {
        return 'The product from second factory';
    }
}
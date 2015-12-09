<?php

namespace LazyInitialization;

class FirstProduct implements Product {
    public function getName() {
        return 'The first product';
    }
}
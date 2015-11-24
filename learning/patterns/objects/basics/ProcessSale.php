<?php

class ProcessSale {

    private $callbacks;

    public function registerCallback($callback) {
        if(!is_callable($callback)) {
            throw new Exception("Функция обратного вызова не вызываема");
        }
        $this->callbacks[] = $callback;
    }

    public function sale(Product $product) {
        print("$product->name: обрабатывается...");
        foreach ($this->callbacks as $callback) {
            call_user_func($callback, $product);
        }
    }
}
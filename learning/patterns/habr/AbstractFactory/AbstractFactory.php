<?php

namespace AbstractFactory;

abstract class AbstractFactory {

    public static function getFactory() {
        switch (Config::$factory) {
            case 1:
                return new FirstFactory();
            case 2:
                return new SecondFactory();
            default : 
                throw new \Exception('Bad config');
        }
    }

    abstract public function getProduct();
}
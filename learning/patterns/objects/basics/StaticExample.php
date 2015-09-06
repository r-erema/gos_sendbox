<?php

class StaticExample {

    public static $aNum = 0;

    static public function sayHello() {
        print 'Privet! ' . ++self::$aNum;
    }

}
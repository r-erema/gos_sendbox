<?php

class MegaApptEncoder  extends ApptEncoder{
    function encode() {
        return "Данные о встрече закодированны в формате MegaCal" . PHP_EOL;
    }
}
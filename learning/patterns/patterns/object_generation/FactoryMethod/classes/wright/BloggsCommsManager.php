<?php

namespace learning\patterns\patterns\object_generation\FactoryMethod\classes\wright;

class BloggsCommsManager extends CommsManager {
    function getHeaderText() {
        return "BloggsCal верхний колонтитул" . PHP_EOL;
    }

    function getApptEncoder() {
        return new \BloggsApptEncoder();
    }

    function getFooterText() {
        return "BloggsCal нижний колонтитул" . PHP_EOL;
    }
}
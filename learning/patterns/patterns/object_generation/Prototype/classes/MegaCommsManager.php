<?php

class MegaCommsManager extends CommsManager {
    function getHeaderText() {
        return "MegaCal верхний колонтитул" . PHP_EOL;
    }

    function getApptEncoder() {
        return new BloggsApptEncoder();
    }

    function getTtdEncoder() {
        return new BloggsTtdEncoder();
    }

    function getContactEncoder() {
        return new BloggsContactEncoder();
    }


    function getFooterText() {
        return "MegaCal нижний колонтитул" . PHP_EOL;
    }


}
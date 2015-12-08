<?php

class BloggsCommsManager extends CommsManager {
    function getHeaderText() {
        return "BloggsCal верхний колонтитул" . PHP_EOL;
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
        return "BloggsCal нижний колонтитул" . PHP_EOL;
    }


}
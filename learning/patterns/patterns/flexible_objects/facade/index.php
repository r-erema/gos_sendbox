<?php

    spl_autoload_register(function ($class) {
        require_once "classes/$class.php";
    });

    function getProductFileLines($file) {
        return file($file);
    }

    function getProductObjectFromId($id, $productName) {
        return new Product($id, $productName);
    }

    function getNameFromLine($line) {
        if (preg_match('/.*-(.*)\s\d+/', $line, $array)) {
            return str_replace('_', ' ', $array[1]);
        }
        return '';
    }

    function getIdFromLine($line) {
        if (preg_match('/^(\d(1,3))-/', $line, $array)) {
            return $array[1];
        }
        return -1;
    }

    class Product {
        public $id;
        public $name;

        /**
         * Product constructor.
         * @param $id
         * @param $name
         */
        public function __construct($id, $name) {
            $this->id = $id;
            $this->name = $name;
        }


    }
/*
    $lines = getProductFileLines('file');

    foreach ($lines as $line) {
        $id = getIdFromLine($line);
        $name = getNameFromLine($line);
        $objects[$id] = getProductObjectFromId($id, $name);
    }*/

$facade = new ProductFacade('file');
$p = $facade->getProduct(-1);
$f = 1;
<?php

class ProductFacade {

    private $products = [];

    /**
     * @param $file
     */
    public function __construct($file) {
        $this->file = $file;
        $this->compile();
    }

    private function compile() {
        $lines = getProductFileLines($this->file);
        foreach ($lines as $line) {
            $id = getIdFromLine($line);
            $name = getNameFromLine($line);
            $this->products[$id] = getProductObjectFromId($id, $name);
        }
    }

    /**
     * @return array
     */
    public function getProducts() {
        return $this->products;
    }

    public function getProduct($id) {
        if (isset($this->products[$id])) {
            return $this->products[$id];
        }
        return null;
    }
}
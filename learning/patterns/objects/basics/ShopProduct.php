<?php

class ShopProduct implements Chargeable {
    private $id;
    private $title = 'Стандартный товар';
    private $productMainName = 'Фамилия автора';
    private $productFirstName = 'Имя автора';
    private $discount = 0;
    protected $price = 0;

    public function __construct($title, $mainName, $firstName, $priceOfProduct) {
        $this->title = $title;
        $this->productMainName = $mainName;
        $this->productFirstName = $firstName;
        $this->price = $priceOfProduct;
    }

    public static function getInstance($id, PDO $pdo) {
        $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
        $result = $stmt->execute(array($id));
        $row = $stmt->fetch();

        if(empty($row)) {
            return null;
        }

        if ($row['type'] == 'book') {
            $product = new BookProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price'],
                $row['numpages']
            );
        } elseif ($row['type'] == 'cd') {
            $product = new CDProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price'],
                $row['playlength']
            );
        } else {
            $product = new ShopProduct(
                $row['title'],
                $row['firstname'],
                $row['mainname'],
                $row['price']
            );
        }
        $product->setId($row['id']);
        $product->setDiscount($row['discount']);
        return $product;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getProductMainName() {
        return $this->productMainName;
    }

    public function getProductFirstName() {
        return $this->productFirstName;
    }

    public function getProducer() {
        return "{$this->productFirstName} {$this->productMainName}";
    }

    public function getSummaryLine() {
        return "$this->title ($this->productMainName, $this->productFirstName)";
    }

    public function getPrice() {
        return $this->price - $this->discount;
    }

    public function setId($id) {
        return$this->id = $id;
    }

    public function setDiscount($discount) {
        $this->discount = $discount;
    }
}



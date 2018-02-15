<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 30.10.17
 * Time: 11.01
 */

require_once 'bootstrap.php';

$id = $argv[1];
$newName = $argv[2];

$product = $entityManager->find('\learning\Doctrine\GettingStarted\src\Product', $id); /** @var \learning\Doctrine\GettingStarted\src\Product $product */

if ($product === null) {
    echo "Product {$id} does not exist" . PHP_EOL;
    exit(1);
}

$product->setName($newName);
$entityManager->flush();
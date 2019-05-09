<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 27.10.17
 * Time: 11.37
 */

require_once 'bootstrap.php';

$newProductName = $argv[1];

$product = new \learning\Doctrine\GettingStarted\src\Product();
$product->setName($newProductName);

$entityManager->persist($product);
$entityManager->flush();

echo "Created Product with ID {$product->getId()}" . PHP_EOL;

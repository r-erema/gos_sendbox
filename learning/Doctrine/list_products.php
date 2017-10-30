<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 27.10.17
 * Time: 11.44
 */

require_once 'bootstrap.php';

$productRepository = $entityManager->getRepository('learning\Doctrine\src\Product');
$products = $productRepository->findAll();

foreach ($products as $product) { /** @var \learning\Doctrine\src\Product $product */
    echo sprintf('-%s' . PHP_EOL, $product->getName());
}
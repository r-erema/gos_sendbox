<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 30.10.17
 * Time: 13.05
 */

require_once 'bootstrap.php';

$dql = 'SELECT b, e, r, p FROM learning\Doctrine\src\Bug b JOIN b.engineer e JOIN b.reporter r JOIN b.products p ORDER BY b.created DESC';

$query = $entityManager->createQuery($dql);
$query->setMaxResults(30);
$bugs = $query->getResult();

foreach ($bugs as $bug) {/** @var \learning\Doctrine\src\Bug $bug */
    echo "{$bug->getDescription()} - {$bug->getCreated()->format('d.m.Y')}" . PHP_EOL;
    echo "Reported by: {$bug->getReporter()->getName()}" . PHP_EOL;
    echo "Assigned by: {$bug->getEngineer()->getName()}" . PHP_EOL;
    foreach ($bug->getProducts() as $product) {/** @var \learning\Doctrine\src\Product $product */
        echo "Platform: {$product->getName()}" . PHP_EOL;
    }
    echo PHP_EOL;
}
<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 30.10.17
 * Time: 14.35
 */

require_once 'bootstrap.php';

$dql = "SELECT p.id, p.name, count(b.id) AS openBugs FROM learning\Doctrine\GettingStarted\src\Bug b ".
       "JOIN b.products p WHERE b.status = 'OPEN' GROUP BY p.id";
$productBugs = $entityManager->createQuery($dql)->getScalarResult();

foreach ($productBugs as $productBug) {
    echo "{$productBug['name']} has {$productBug['openBugs']} open bugs!" . PHP_EOL;
}

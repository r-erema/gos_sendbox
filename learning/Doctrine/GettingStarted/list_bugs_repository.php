<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 30.10.17
 * Time: 14.46
 */
//todo: Notice outputs: Notice:  Undefined index: assignedBugs...
require_once 'bootstrap.php';

/** @var \learning\Doctrine\GettingStarted\src\BugRepository $repo */
$repo = $entityManager->getRepository('learning\Doctrine\GettingStarted\src\Bug');
$bugs = $repo->getRecentBugs();

foreach ($bugs as $bug) {/** @var \learning\Doctrine\GettingStarted\src\Bug $bug */
    echo "{$bug->getDescription()} - {$bug->getCreated()->format('d.m.Y')}" . PHP_EOL;
    echo "    Reported by: {$bug->getReporter()->getName()}" . PHP_EOL;
    echo "    Assigned to: {$bug->getEngineer()->getName()}" . PHP_EOL;
    foreach ($bug->getProducts() as $product) {
        echo "    Platform: {$product->getName()}" . PHP_EOL;
    }
}

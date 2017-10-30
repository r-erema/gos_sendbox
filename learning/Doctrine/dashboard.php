<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 30.10.17
 * Time: 14.32
 */

require_once 'bootstrap.php';

$theUserId = $argv[1];

$dql = "SELECT b, e, r FROM learning\Doctrine\src\Bug b JOIN b.engineer e JOIN b.reporter r ".
       "WHERE b.status = 'OPEN' AND (e.id = ?1 OR r.id = ?1) ORDER BY b.created DESC";

$myBugs = $entityManager->createQuery($dql)
                        ->setParameter(1, $theUserId)
                        ->setMaxResults(15)
                        ->getResult();

echo 'You have created or assigned to ' . count($myBugs) . ' open bugs:' . PHP_EOL . PHP_EOL;

foreach ($myBugs as $bug) { /** @var \learning\Doctrine\src\Bug $bug */
    echo "{$bug->getId()} - {$bug->getDescription()}" . PHP_EOL;
}
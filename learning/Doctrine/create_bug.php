<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 30.10.17
 * Time: 12.14
 */

require_once 'bootstrap.php';

$reportedId = $argv[1];
$engineerId = $argv[2];
$productIds = explode(', ', $argv[3]);


$reporter = $entityManager->find('learning\Doctrine\src\User', $reportedId); /** @var \learning\Doctrine\src\User $reporter */
$engineer = $entityManager->find('learning\Doctrine\src\User', $engineerId); /** @var \learning\Doctrine\src\User $engineer */

if (!$reporter || !$engineer) {
    echo 'No reporter and/or engineer found for the given id(s)' . PHP_EOL;
    exit(1);
}

$bug = new \learning\Doctrine\src\Bug();
$bug->setDescription("Something does not work!");
$bug->setCreated(new DateTime());
$bug->setStatus('OPEN');

foreach ($productIds as $productId) {
    $product = $entityManager->find('learning\Doctrine\src\Product', $productId); /** @var \learning\Doctrine\src\Product $product */
    $bug->assignToProduct($product);
}

$bug->setReporter($reporter);
$bug->setEngineer($engineer);

$entityManager->persist($bug);
$entityManager->flush();

echo "Your new Bug Id: {$bug->getId()}" . PHP_EOL;


<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 30.10.17
 * Time: 12.00
 */

require_once 'bootstrap.php';

$newUsername = $argv[1];

$user = new \learning\Doctrine\GettingStarted\src\User();
$user->setName($newUsername);

$entityManager->persist($user);
$entityManager->flush();

echo "Created User With ID {$user->getId()}" . PHP_EOL;
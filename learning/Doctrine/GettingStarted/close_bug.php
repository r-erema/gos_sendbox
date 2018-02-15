<?php
/**
 * Created by PhpStorm.
 * User: gutsout
 * Date: 30.10.17
 * Time: 14.37
 */

require_once 'bootstrap.php';

$theBugId = $argv[1];

$bug = $entityManager->find('learning\Doctrine\GettingStarted\src\Bug', (int)$theBugId);
$bug->close();

$entityManager->flush();
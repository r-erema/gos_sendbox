<?php
require_once 'bootstrap.php';

$theBugId = $argv[1];

$bug = $entityManager->find('learning\Doctrine\src\Bug', (int)$theBugId);

echo 'Bug: '.$bug->getDescription() . PHP_EOL;
echo 'Engineer: '.$bug->getEngineer()->getName() . PHP_EOL;
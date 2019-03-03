<?php

declare(strict_types=1);
set_time_limit(0);
$pdo = new PDO('sqlite:data/db.db', null, null, [\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION]);
$pdo->exec('CREATE TABLE IF NOT EXISTS locks_test (`name` VARCHAR(255), `value` VARCHAR(255));');

const LOCK_FILE = __DIR__ . '/data/lock.lock';

$name = 'lock_file';
$value = basename(__FILE__);

$stmt = $pdo->prepare('SELECT `value` FROM locks_test WHERE `name` = ?;');
$stmt->execute([$name]);
$result = $stmt->fetchAll();

$key = ftok(LOCK_FILE, '1');
$semaphore = sem_get($key);
if (sem_acquire($semaphore, true) !== false) {
    if (count($result) === 0) {
        $stmt = $pdo->prepare('INSERT INTO locks_test(`name`, `value`) VALUES (?, ?);');
        $stmt->execute([$name, $value]);
    } else {
        $stmt = $pdo->prepare('UPDATE locks_test SET `value` = ? WHERE name = ?;');
        $stmt->execute([$value, $name]);
    }
    echo 'Updated', PHP_EOL;
} else {
    echo 'Another script running', PHP_EOL;
}

sleep(10);
echo "{$value} done", PHP_EOL;
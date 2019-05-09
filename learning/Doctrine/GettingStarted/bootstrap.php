<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

$config = require_once __DIR__ . '/../../configs/config.php';
require_once $config['autoloader_path'];

$isDevMode = true;

$config = Setup::createAnnotationMetadataConfiguration([__DIR__ . '/src'], $isDevMode);

$connection = [
    'driver' => 'pdo_sqlite',
    'path' => __DIR__ . '/db.sqlite'
];

$entityManager = EntityManager::create($connection, $config);

<?php

$excludedFiles = [
    '.',
    '..',
    'index.php'
];

$filesToInclude = array_filter(scandir(__DIR__), function ($dir) use ($excludedFiles) {
    return !in_array($dir, $excludedFiles);
});
natsort($filesToInclude);
foreach ($filesToInclude as $file) {
    require_once __DIR__ . "/{$file}";
    echo PHP_EOL . PHP_EOL;
}

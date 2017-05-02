<?php

$dir = new DirectoryIterator('./.');
$it = new CallbackFilterIterator($dir, function ($value, $key, $iterator) {
    return preg_match('#^.*Iterator\.php$#', $value);
});

foreach ($it as $file) {
    echo $file . PHP_EOL;
}
<?php

$dir = new DirectoryIterator('./.');
$it = new RegexIterator($dir, '#^.*Iterator\.php$#');

foreach ($it as $file) {
    echo $file . PHP_EOL;
}
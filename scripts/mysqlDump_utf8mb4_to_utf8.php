<?php

$pathToDump = $argv[1];

$dumpContent = file_get_contents($pathToDump);
$dumpContent = str_replace('utf8mb4', 'utf8', $dumpContent);

if (file_put_contents($pathToDump, $dumpContent)) {
    echo 'Done' . PHP_EOL;
    exit(0);
}
exit(1);

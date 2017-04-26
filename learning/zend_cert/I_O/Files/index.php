<?php

$filePath = __DIR__ . '/../file.txt';
$csvFilePath = __DIR__ . '/../file.csv';

/*$file = fopen($filePath, 'a+');

if (!$file) {
    die('Unable to open/create file');
}

$fs = filesize($filePath);
if (filesize($filePath) === 0) {
    $counter = 0;
} else {
    $counter = (int) fgets($file);
}

ftruncate($file, 0);

$counter++;

fwrite($file, $counter);

echo "There has been {$counter} hits to this site.";*/

/*if (!file_exists($filePath)) {
    throw new Exception('The file does not exists');
}

$file = fopen($filePath, 'r');

$text = '';

$counter = 0;
while (!feof($file)) {
    $text .= fread($file, 1);
    $counter++;
}

echo "There has been {$counter} hits to this site.";*/

$file = fopen($csvFilePath, 'a+');

$text = '';
while ($row = fgetcsv($file)) {
    $text .= implode(',',$row);
}

fputcsv($file, [
    mt_rand(1,100),
    mt_rand(101,200),
    mt_rand(201, 300)
]);
fclose($file);
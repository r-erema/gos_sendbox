<?php

$manuals = scandir('./archs');
unset($manuals[array_search('.', $manuals)]);
unset($manuals[array_search('..', $manuals)]);

foreach ($manuals as $manual) {
    convert(realpath("/home/gutsout/HelpAndManualConverter/archs/{$manual}"));
}

function convert($manual) {
    echo "{$manual} converting...";
    $baggageDir = "{$manual}/Baggage";
    $files = scandir($baggageDir);
    $emfs = array_filter($files, function ($file) {
        return preg_match('#.*\.emf$#', $file);
    });

    foreach ($emfs as $emfFile) {
        preg_match('#(.*)\.emf$#', $emfFile, $matches);
        $fileName = $matches[1];
        $sourceEmf = escapeshellarg("{$baggageDir}/{$fileName}.emf");
        $targetPng = escapeshellarg("{$baggageDir}/{$fileName}.png");
        echo `inkscape -e {$targetPng} {$sourceEmf} --export-ignore-filters --export-ps-level=3`;
        unlink("{$baggageDir}/{$fileName}.emf");
    }

    $topicsDir = "{$manual}/Topics";
    $files = scandir($topicsDir);
    unset($files[array_search('.', $files)]);
    unset($files[array_search('..', $files)]);
    foreach ($files as $file) {
        $file = "{$topicsDir}/$file";
        $content = file_get_contents($file);
        $content = str_replace('.emf', '.png', $content);
        file_put_contents($file, $content);
    }
}
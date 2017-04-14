<?php

$xmlFilePath = function (): string {return __DIR__ . '/../library.xml';};

$library = simplexml_load_file($xmlFilePath());

$xmlStr = file_get_contents($xmlFilePath());
$library = new SimpleXMLElement($xmlStr);
$f = 1;
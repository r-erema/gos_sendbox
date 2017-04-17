<?php

$filePath = __DIR__ . '/../library.xml';

$xmlParser = xml_parser_create();

xml_set_element_handler($xmlParser,
    function ($parser, $name, $attributes) {},
    function ($parser, $name) {}
);

$fgc = file_get_contents($filePath);
xml_parse($xmlParser, file_get_contents($filePath));
$error = xml_error_string(xml_get_error_code($xmlParser));
$f =1;


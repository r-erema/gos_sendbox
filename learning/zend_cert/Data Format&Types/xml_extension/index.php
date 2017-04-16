<?php

$filePath = __DIR__ . '/../library.xml';

$xmlParser = xml_parser_create();

xml_set_element_handler($xmlParser,
    function ($parser, $name, $attributes) {
        $parser = $parser;
        $name = $name;
        $attributes = $attributes;
    },
    function ($parser, $name) {
        $parser = $parser;
        $name = $name;
    }
);

$fgc = file_get_contents($filePath);
xml_parse($xmlParser, file_get_contents($filePath));
$error = xml_error_string(xml_get_error_code($xmlParser));
$f =1;


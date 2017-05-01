<?php

set_error_handler(function ($no, $str, $file, $line, $context) {
    $text = 'Date: ' . date('Y-m-d H:i:s') . PHP_EOL
            . implode(PHP_EOL, func_get_args()) . PHP_EOL
            . str_repeat('=', 100) . PHP_EOL . PHP_EOL;
    file_put_contents(__DIR__ . '/error_log.log', $text, FILE_APPEND) ;
});

foreach (null as $r) {}
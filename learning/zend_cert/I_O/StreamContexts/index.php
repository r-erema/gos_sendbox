<?php



$httpOptions = stream_context_create(['http' => [
    'user_agent' => 'Roma\'s browser',
    'max_redirects' => 3
]]);

$file = file_get_contents('http://gutsout.web/learning/zend_cert/I_O/StreamContexts/file.phtml', false, $httpOptions);
$f = 1;
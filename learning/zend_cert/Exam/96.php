
<?php

/*
When retrieving data from URLs, what are valid ways to make sure all file_get_contents
calls send a certain user agent string? (Choose 2)

A.
stream_context_set_option($context, "http", "user_agent", "My Cool Browser");

B.
ini_set('user_agent', "My Cool Browser");

C.
stream_context_set_option("user_agent", "My Cool Browser");

D.
$default_opts = array('http'=>array('user_agent'=>"My Cool Browser"));
$default = stream_context_set_default($default_opts);

Answer: A,D.
stream_context_set_option($context, "http", "user_agent", "My Cool Browser");
$default_opts = array(‘http’=>array(‘user_agent’=>”My Cool Browser”)); $default =
stream_context_set_default($default_opts);

*/
echo '96. When retrieving data from URLs, what are valid ways to make sure all file_get_contents calls send a certain user agent string? (Choose 2)' . PHP_EOL;
echo 'stream_context_set_option($context, "http", "user_agent", "My Cool Browser");
$default_opts = array(‘http’=>array(‘user_agent’=>”My Cool Browser”)); $default =
stream_context_set_default($default_opts);' . PHP_EOL;
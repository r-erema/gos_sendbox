<?php
/*
Which of the following will set a 10 seconds read timeout for a stream?

A.
ini_set(“default_socket_timeout”, 10);

B.
stream_read_timeout($stream, 10);

C.
Specify the timeout as the 5th parameter to the fsockopen() function used to open a
stream

D.
stream_set_timeout($stream, 10);

E.
None of the above

Answer: D
stream_set_timeout($stream, 10);
*/

echo '16. Which of the following will set a 10 seconds read timeout for a stream?' . PHP_EOL;
echo 'stream_set_timeout($stream, 10);';

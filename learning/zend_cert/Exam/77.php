
<?php

/*
Under what condition may HTTP headers be set from PHP if there is content echoed prior to the header function being used?

A.
The client supports local buffering

B.
The webserver uses preemptive mode

C.
headers_sent() returns true

D.
Output buffering is enabled

Answer: D.
Output buffering is enabled

*/
echo '77. Under what condition may HTTP headers be set from PHP if there is content echoed prior to the header function being used?' . PHP_EOL;
echo 'Output buffering is enabled' . PHP_EOL;

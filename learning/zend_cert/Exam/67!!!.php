
<?php

/*
Given a php.ini setting of default_charset = utf-8 what will the following code print in the
browser? header(‘Content-Type: text/html; charset=iso-8859-1’); echo
‘✂✔✝’;

A.
Three Unicode characters, or unreadable text, depending on the browser

B.
✂✔✝

C.
A blank line due to charset mismatch

Answer: A.
Three Unicode characters, or unreadable text, depending on the browser
*/
echo '67. Given a php.ini setting of default_charset = utf-8 what will the following code print in the
browser? header(‘Content-Type: text/html; charset=iso-8859-1’); echo ‘✂✔✝’;' . PHP_EOL;
echo 'Three Unicode characters, or unreadable text, depending on the browser' . PHP_EOL;

<?php

/*
What is the length of a string returned by: md5(rand(), TRUE);

A.
Depends on the value returned by rand() function

B.
32

C.
24

D.
16

E.
64

Answer: E.
7

*/
echo '207. What is the length of a string returned by: md5(rand(), TRUE);' . PHP_EOL;
echo strlen(md5(rand(), TRUE));

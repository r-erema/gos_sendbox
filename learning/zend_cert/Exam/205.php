
<?php

/*
How many elements does the array $matches from the following code contain? $str = "The
cat sat on the roof of their house."; $matches = preg_split("/(the)/i", $str, -1,
PREG_SPLIT_DELIM_CAPTURE);

A.
3

B.
9

C.
4

D.
2

E.
7

Answer: E.
7

*/
echo '205. How many elements does the array $matches from the following code contain? $str = "The
cat sat on the roof of their house."; $matches = preg_split("/(the)/i", $str, -1,
PREG_SPLIT_DELIM_CAPTURE);' . PHP_EOL;

$str = "The cat sat on the roof of their house.";
$matches = preg_split("/(the)/i", $str, -1, PREG_SPLIT_DELIM_CAPTURE);
echo count($matches);
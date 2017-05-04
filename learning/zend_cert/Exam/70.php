
<?php

/*
What is the output of the following code? $text = 'This is text'; $text1 = <<<'TEXT' $text
TEXT; $text2 = <<<TEXT $text1 TEXT; echo “$text2”;

A.
$text

B.
$text1

C.
$text2

D.
This is text

Answer: A.
$text
*/
echo '70. What is the output of the following code? $text = \'This is text\'; $text1 = <<<\'TEXT\' $text' . PHP_EOL;
$text = 'This is text';
$text1 = <<<'TEXT'
$text
TEXT;
$text2 = <<<TEXT
$text1
TEXT;
echo "$text2";

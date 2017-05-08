<?php
$text = 'This is text';
$text1 = <<<'TEXT'
$text
TEXT;
$text2 = <<<TEXT
$text1
TEXT;
echo "$text2";


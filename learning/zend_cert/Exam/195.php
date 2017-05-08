
<?php

/*
Which parts of the text are matched in the following regular expression? $text = <<<EOT
The big bang bonged under the bung. EOT; preg_match_all('@b.n?g@', $text, $matches);

A.
bang bong bung

B.
bang bonged bung

C.
big bang bong bung

D.
big bang bung

Answer: C.
big bang bong bung

*/
echo '195. Which parts of the text are matched in the following regular expression? $text = <<<EOT
The big bang bonged under the bung. EOT; preg_match_all(\'@b.n?g@\', $text, $matches);' . PHP_EOL;
$text = <<<EOT
The big bang bonged under the bung.
EOT;
preg_match_all('@b.n?g@', $text, $matches);
var_dump($matches);
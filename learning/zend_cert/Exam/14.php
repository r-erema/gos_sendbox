<?php
/*
Which of the following code snippets DO NOT write the exact content of the file “source.txt” to “target.txt”? (Choose 2)

A.
file_put_contents(“target.txt”, fopen(“source.txt”, “r”));

B.
file_put_contents(“target.txt”, file_get_contents(“source.txt”));

C.
$handle = fopen(“target.txt”, “w+”); fwrite($handle, file_get_contents(“source.txt”));
fclose($handle);

D.
file_put_contents(“target.txt”, readfile(“source.txt”));

E.
file_put_contents(“target.txt”, join(file(“source.txt”), “\n”));

Answer: D, E
file_put_contents(“target.txt”, readfile(“source.txt”));
file_put_contents(“target.txt”, join(file(“source.txt”), “\n”));

*/

echo '14. Which of the following code snippets DO NOT write the exact content of the file “source.txt” to “target.txt”? (Choose 2)' . PHP_EOL;
echo 'file_put_contents(“target.txt”, join(file(“source.txt”), “\n”));' . PHP_EOL;
echo 'file_put_contents(“target.txt”, fopen(“source.txt”, “r”));';

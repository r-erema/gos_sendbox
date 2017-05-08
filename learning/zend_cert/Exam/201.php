
<?php

/*
You want to access the 3rd character of a string, contained in the variable $test. Which of
the following possibilites work? (Choose 2)

A.
echo $test(3);

B.
echo $test[2];

C.
echo $test(2);

D.
echo $test{2};

E.
echo $test{3};

Answer: B,D.
echo $test[2];
echo $test{2};

*/
echo '201. You want to access the 3rd character of a string, contained in the variable $test. Which of
the following possibilites work? (Choose 2)' . PHP_EOL;
$test = 'test';
echo $test[2];
echo $test{2};
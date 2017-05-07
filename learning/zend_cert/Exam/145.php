
<?php

/*
Which of the following code snippets is correct? (Choose 2)

A.
interface Drawable { abstract function draw(); }

B.
interface Point { function getX(); function getY(); }

C.
interface Line extends Point { function getX2(); function getY2(); }

D.
interface Circle implements Point { function getRadius(); }

Answer: B,C.
interface Line extends Point { function getX2(); function getY2(); }, interface Circle implements Point { function getRadius(); }

*/
echo '145. Which of the following code snippets is correct? (Choose 2)' . PHP_EOL;
echo 'interface Line extends Point { function getX2(); function getY2(); }, interface Circle implements Point { function getRadius(); }' . PHP_EOL;


<?php

/*
What is the output of the following code? try { class MyException extends Exception {}; try {
throw new MyException; } catch (Exception $e) { echo "1:"; throw $e; } catch (MyException
$e) { echo "2:"; throw $e; } } catch (Exception $e) { echo get_class($e); }

A.
A parser error, try cannot be followed by multiple catch

B.
1:

C.
2:

D.
1:Exception

E.
1:MyException

F.
2:MyException

G.
MyException

Answer: E.
1:MyException

*/
echo '137. What is the output of the following code? try { class MyException extends Exception {}; try {
throw new MyException; } catch (Exception $e) { echo "1:"; throw $e; } catch (MyException
$e) { echo "2:"; throw $e; } } catch (Exception $e) { echo get_class($e); }' . PHP_EOL;

try {
    class MyException extends Exception {};
    try {
        throw new MyException;
    } catch (Exception $e) {
        echo "1:"; throw $e;
    } catch (MyException $e) {
        echo "2:"; throw $e;
    }
} catch (Exception $e) {
    echo get_class($e);
}
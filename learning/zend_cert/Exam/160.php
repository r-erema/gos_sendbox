
<?php

/*
When a query that is supposed to affect rows is executed as part of a transaction, and
reports no affected rows, it could mean that: (Choose 2)

A.
The transaction was committed without error

B.
The transaction failed

C.
The transaction affected no lines

D.
The transaction was rolled back

Answer: B,C.
The transaction failed, The transaction affected no lines

*/
echo '160. When a query that is supposed to affect rows is executed as part of a transaction, and
reports no affected rows, it could mean that: (Choose 2)' . PHP_EOL;
echo 'The transaction failed, The transaction affected no lines' . PHP_EOL;

<?php

/*
When using password_hash() with the PASSWORD_DEFAULT algorithm constant, which
of the following is true? (Choose 2)

A.
The algorithm that is used for hashing passwords can change when PHP is upgraded.

B.
The salt option should always be set to a longer value to account for future algorithm
requirements.

C.
The string length of the returned hash can change over time.

D.
The hash algorithm that’s used will always be compatible with crypt() .

Answer: A,C.
The algorithm that is used for hashing passwords can change when PHP is upgraded, The string length of the returned hash can change over time.

*/
echo '114. When using password_hash() with the PASSWORD_DEFAULT algorithm constant, which of the following is true? (Choose 2)' . PHP_EOL;
echo 'The algorithm that is used for hashing passwords can change when PHP is upgraded, The string length of the returned hash can change over time.' . PHP_EOL;

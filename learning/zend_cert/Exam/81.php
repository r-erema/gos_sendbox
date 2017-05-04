
<?php

/*
An HTML form has two submit buttons. After submitting the form, how can you determine
with PHP which button was clicked?

A.
Put the two buttons in different forms, but make sure they have the same name.

B.
You cannot determine this with PHP only. You must use JavaScript to add a value to the
URL depending on which button has been clicked.

C.
An HTML form may only have one button.

D.
Assign name and value attributes to each button and use $_GET or $_POST to find out
which button has been clicked.

Answer: C.
Use the headers_sent() function

*/
echo '80. An HTML form has two submit buttons. After submitting the form, how can you determine with PHP which button was clicked?' . PHP_EOL;
echo 'Assign name and value attributes to each button and use $_GET or $_POST to find out which button has been clicked.' . PHP_EOL;

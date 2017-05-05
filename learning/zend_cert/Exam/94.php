
<?php

/*
Consider the following code. What can be said about the call to file_get_contents? $getdata
= "foo=bar"; $opts = array('http' => array( 'method' => 'POST', 'header' => 'Content-type:
application/x-www-form-urlencoded', 'content' => $getdata ) ); $context =
stream_context_create($opts); $result = file_get_contents('http://example.com/submit.php',
false, $context);

A.
A GET request will be performed on http://example.com/submit.php

B.
A POST request will be performed on http://example.com/submit.php

C.
An error will be displayed

Answer: B.
A POST request will be performed on http://example.com/submit.php

*/
echo '94. Consider the following code. What can be said about the call to file_get_contents? $getdata
= "foo=bar"; $opts = array(\'http\' => array( \'method\' => \'POST\', \'header\' => \'Content-type:
application/x-www-form-urlencoded\', \'content\' => $getdata ) ); $context =
stream_context_create($opts); $result = file_get_contents(\'http://example.com/submit.php\',
false, $context);' . PHP_EOL;

$getdata = "foo=bar";
$opts = array(
    'http' => array(
        'method' => 'POST',
        'header' => 'Content-type: application/x-www-form-urlencoded',
        'content' => $getdata
    )
);
$context = stream_context_create($opts);
$result = file_get_contents('http://gutsout.web', false, $context);
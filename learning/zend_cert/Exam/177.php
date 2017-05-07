
<?php

/*
How can the id attribute of the 2nd baz element from the XML string below be retrieved from
the SimpleXML object found inside $xml? <?xml version='1.0′?> <foo> <bar> <baz
id="1">One</baz> <baz id="2">Two</baz> </bar> </foo>

A.
$xml->foo->bar->baz[2]['id']

B.
$xml->bar->baz[1]['id']

C.
$xml->foo->baz[2]['id']

D.
$xml->getElementById('2');

E.
$xml->foo->bar->baz[1]['id']

Answer: B.
$xml->bar->baz[1]['id']

*/
echo '177. How can the id attribute of the 2nd baz element from the XML string below be retrieved from
the SimpleXML object found inside $xml? <?xml version=\'1.0′?> <foo> <bar> <baz
id="1">One</baz> <baz id="2">Two</baz> </bar> </foo>' . PHP_EOL;
echo '$xml->bar->baz[1][\'id\']' . PHP_EOL;
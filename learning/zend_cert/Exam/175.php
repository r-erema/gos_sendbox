
<?php

/*
The XML document below has been parsed into $xml via SimpleXML. How can the value of
<foo> tag accessed? <?xml version=’1.0′?> <document> <bar> <foo>Value</foo> </bar>
</document>

A.
$xml->document->bar->foo

B.
$xml->getElementByName(‘foo’);

C.
$xml[‘document’][‘bar’][‘foo’]

D.
$xml->bar->foo

E.
$xml->bar[‘foo’]

Answer: D.
$xml->bar->foo

*/
echo '175. The XML document below has been parsed into $xml via SimpleXML. How can the value of
<foo> tag accessed? <?xml version=’1.0′?> <document> <bar> <foo>Value</foo> </bar>
</document>' . PHP_EOL;
echo '$xml->bar->foo' . PHP_EOL;
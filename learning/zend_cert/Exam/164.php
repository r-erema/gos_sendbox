
<?php

/*
Consider the following XML code: <?xml version="1.0" encoding="utf-8"?> <books> <book
id="1">PHP 5.5 in 42 Hours</book> <book id="2">Learning PHP 5.5 The Hard Way</book>
</books> Which of the following SimpleXML calls prints the name of the second book? (Let
$xml = simplexml_load_file("books.xml"); .) (Choose 2)

A.
echo $xml->books->book[2];

B.
$c = $xml->children(); echo $c[1];

C.
echo $xml->xpath("/books/book[@id=2]");

D.
echo $xml->books->book[1];

E.
echo $xml->book[1];

Answer: B, E.
$c = $xml->children(); echo $c[1];
echo $xml->book[1];

*/
echo '164. Consider the following XML code: <?xml version="1.0" encoding="utf-8"?> <books> <book
id="1">PHP 5.5 in 42 Hours</book> <book id="2">Learning PHP 5.5 The Hard Way</book>
</books> Which of the following SimpleXML calls prints the name of the second book? (Let
$xml = simplexml_load_file("books.xml"); .) (Choose 2)' . PHP_EOL;
$xml = simplexml_load_string('<?xml version="1.0" encoding="utf-8"?>
        <books>
            <book id="1">PHP 5.5 in 42 Hours</book>
            <book id="2">Learning PHP 5.5 The Hard Way</book>
    </books>');
echo $xml->book[0] . PHP_EOL;
$c = $xml->children(); echo $c[1];
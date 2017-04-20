<?php

$dom = new DOMDocument();
$dom->load(__DIR__ . '/../library.xml');

$ch = $dom->firstChild;
$xpath = new DOMXPath($dom);
//$xpath->registerNamespace('lib', 'http://example.org/library');
//$result = $xpath->query('//lib:title/text()');
$result = $xpath->query('//book/publisher/text()');

foreach ($result as $book) {
    echo "{$book->data} <br />";
}

$book = $dom->createElement('book');
$book->setAttribute('isbn', '978-5-699-87997-7');
$book->setAttribute('title', 'Убийство на улице Морг');
$author = $dom->createElement('author', 'Эдгар Аллан По');
$publisher = $dom->createElement('publisher', 'Эксмо');
$book->appendChild($author);
$book->appendChild($publisher);

$dom->documentElement->appendChild($book);

$result = $xpath->query('//book');
$result->item(1)->parentNode->insertBefore(
    $result->item(1), $result->item(0)
);
$r = 1;



$dom->saveHTMLFile('library.html');
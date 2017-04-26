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

$result->item(1)->parentNode->appendChild($result->item(0));

foreach ($dom->getElementsByTagName('author') as $node) {
    $node->nodeValue = mb_strtoupper($node->nodeValue);
}

$result->item(0)->parentNode->removeChild($result->item(0));
$result->item(1)->removeAttribute('isbn');


$result = $xpath->query('text()', $result->item(2));
$result->item(0)->deleteData(0, $result->item(0)->length);

$node = $dom->createElement('ns1:somenode');
$node->setAttribute('ns2:somenode', 'somevalue');
$node2 = $dom->createElement('ns3:anothernode');
$node->appendChild($node2);

$node->setAttribute('xmlns:ns1', 'http://example.org/ns1');
$node->setAttribute('xmlns:ns2', 'http://example.org/ns2');
$node->setAttribute('xmlns:ns3', 'http://example.org/ns3');

$node->appendChild($node);
echo $dom->saveXML();
//$dom->save(__DIR__ .'/library.html');

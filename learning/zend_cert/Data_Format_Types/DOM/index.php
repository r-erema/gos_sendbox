<?php

/*$dom = new DOMDocument();
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
$dom->saveHTMLFile('library.html');*/
/*
$dom = new DOMDocument();
$node = $dom->createElement('ns1:someNode');
$node->setAttribute('ns2:someAttribute', 'someValue');

$node2 = $dom->createElement('ns3:anotherNode');
$node->appendChild($node2);

$node->setAttribute('xmlns:ns1', 'http://gutsout.web/ns1');
$node->setAttribute('xmlns:ns2', 'http://gutsout.web/ns2');
$node->setAttribute('xmlns:ns3', 'http://gutsout.web/ns3');

$dom->appendChild($node);

echo $dom->saveXML();*/

/*$dom = new DOMDocument();
$node = $dom->createElementNS('http://gutsout.web/ns1', 'ns1:someNode');
$node->setAttributeNS(
    'http://gutsout.web/ns2',
    'ns2:someAttribute',
    'someValue'
);

$node2 = $dom->createElementNS(
    'http://gutsout.web/ns3',
    'ns3:anotherNode'
);
$node3 = $dom->createElementNS(
    'http://gutsout.web/ns1',
    'ns1:anotherNode'
);

$node->appendChild($node2);
$node->appendChild($node3);
$dom->appendChild($node);
$dom->formatOutput = true;
echo $dom->saveXML();*/
/*
$simpleXML= simplexml_load_file(__DIR__ . '/../library.xml');
$node = dom_import_simplexml($simpleXML);
$dom = new DOMDocument();
$dom->appendChild($dom->importNode($node, true));
echo $dom->saveXML();*/

$dom = new DOMDocument();
$dom->load(__DIR__ . '/../library.xml');
echo (simplexml_import_dom($dom))->book[0]->author;
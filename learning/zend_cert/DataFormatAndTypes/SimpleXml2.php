<?php
$library = new SimpleXMLElement('library.xml', null, true);

/*$book = $library->addChild('book');
$book->addAttribute('isbn', '1441255865');
$book->addChild('title', 'Ender\'s Game');
$book->addChild('author', 'Orson Scott Card');
$book->addChild('publisher', 'Tor Science Fiction');
unset($library->book[0]);
echo $library->asXML();*/


/*foreach ($library->children() as $child) {
    echo "{$child->getName()}" . PHP_EOL;
    foreach ($child->attributes() as $attr) {
        echo "\t{$attr->getName()}: {$attr}" . PHP_EOL;
    }
    foreach ($child->children() as $subChild) {
        echo "\t\t{$subChild->getName()}: {$subChild}" . PHP_EOL;
    }
    echo PHP_EOL;
}*/

/*$titles = $library->xpath('/library/book/title');
foreach ($titles as $title) {
    echo "{$title}" . PHP_EOL;
}
echo PHP_EOL . PHP_EOL;
$titles = $library->book[0]->xpath('title');
foreach ($titles as $title) {
    echo "{$title}" . PHP_EOL;
}*/

$namespaces = $library->getDocNamespaces();
foreach ($namespaces as $key => $value) {
    echo "{$key} => {$value}" . PHP_EOL;
}
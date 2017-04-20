<?php

$xmlString = file_get_contents(__DIR__ . '/../library.xml');
$xmlString = preg_replace('/(?:[\x00-\x1F\x7F]|[ ]{2,})/u', '', $xmlString);
$library = simplexml_load_string($xmlString);

if (php_sapi_name() === 'cli') {
    $echo = function (string $string): void {echo $string . PHP_EOL;};
} else {
    $echo = function (string $string): void {echo $string . '<br />';};
}

$book = $library->addChild('book');
$book->addAttribute('isbn', '978-5-17-100400-2');
$book->addAttribute('title', 'Господа Головлевы');
$book->addChild('author', 'Михаил Салтыков-Щедрин');
$book->addChild('publisher', 'Neoclassic');

/** @var $child SimpleXMLElement */
/** @var $attribute SimpleXMLElement */
/** @var $subChild SimpleXMLElement */


/*foreach ($library->children() as $child) {
    $echo($child->getName());

    foreach ($child->attributes() as $attribute) {
        $echo("{$attribute->getName()}: {$attribute}");
    }

    foreach ($child->children() as $subChild) {
        $echo("{$subChild->getName()}: {$subChild}");
    }
    $echo(str_repeat('-', 50) . PHP_EOL);
}*/

header('Content-Type: text\xml');
echo $library->asXML(/*__DIR__ . '/../library.xml'*/);
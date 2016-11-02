<?php
$xml = require 'xml.php';
$movies = new SimpleXMLElement($xml);

echo "Plot: {$movies->movie->plot}" . PHP_EOL . PHP_EOL;

echo "Great-lines: {$movies->movie->{'great-lines'}->line}" . PHP_EOL . PHP_EOL;

foreach ($movies->movie->characters->character as $character) {
    echo "{$character->name} играет {$character->actor}" . PHP_EOL;
}
echo PHP_EOL;

foreach ($movies->movie->rating as $rating) {
    switch ($rating['type']) {
        case 'thumbs' :
            echo "{$rating} thumbs up" . PHP_EOL;
            break;
        case 'stars' :
            echo "{$rating} starts" . PHP_EOL;
            break;
    }
}
echo PHP_EOL;

if ((string)$movies->movie->title == 'PHP: Появление Парсера') {
    echo htmlspecialchars('Мой любимый фильм¡' . PHP_EOL . PHP_EOL);
}

foreach ($movies->xpath('//character') as $character) {
    echo "{$character->name} играет {$character->actor}" . PHP_EOL;
}
echo PHP_EOL;

$movies->movie[0]->characters->character[1]->name = 'Xyi';
echo $movies->asXML() . PHP_EOL;

$character = $movies->movie[0]->characters->addChild('character');
$character->addChild('name', 'Mr. Parser');
$character->addChild('actor', 'John Doe');

$rating = $movies->movie[0]->addChild('rating', 'PG');
$rating->addAttribute('type'. 'mpaa');

echo $movies->asXML() . PHP_EOL . PHP_EOL;

$dom = new DOMDocument();
$dom->loadXML('<books><book><title>Бред</title></book></books>');
$books = simplexml_import_dom($dom);
echo $books->book[0]->title . PHP_EOL . PHP_EOL;

libxml_use_internal_errors(true);
$badXml = "<?xml version='1.0'><broken><xml></broken>";
$sxe = simplexml_load_string($badXml);
if (!$sxe) {
    echo 'Ошибка загрузки XML' . PHP_EOL;
    $errors = libxml_get_errors();
    foreach ($errors as $error) {
        echo "\t {$error->message}";
    }
}
$f =1;
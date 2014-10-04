<meta charset="utf-8">
<?php

function __autoload($class) {
	require_once $class.'.php';
}

echo '<h1>Magic methods</h1>';

$tweet = new Tweet(1, 'Hello world!', ['retweets' => 0, 'favourites' => 0]);

$tweet->text = 'Kawabanga';

var_dump(isset($tweet->text));

//unset($tweet->text);

echo $tweet;

var_dump($tweet);
$tweet = serialize($tweet);
$tweet = unserialize($tweet);
var_dump($tweet);

var_dump($tweet);

Tweet::test();

var_dump($tweet('!!!!!!!!!!!!!!!!!!!!!!'));
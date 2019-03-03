<?php

use Philo\Blade\Blade;
use pkr\Dealer;
use pkr\DeckFactory;

require_once __DIR__ . '/vendor/autoload.php';

$playersCount = 9;

$players = [];
for ($i = 0; $i < $playersCount; $i++) {
    $players[] = new \pkr\Player("Player{$i}");
}

$dealer = new Dealer(DeckFactory::createDeck(), $players);
$dealer->washDeck();
$dealer->shuffleDeck();
$dealer->dealCardsToPlayers();

$blade = new Blade(__DIR__ . '/views', __DIR__ . '/cache');
$view = $blade->view(); /** @var \Illuminate\View\Factory $view */
echo $view->make('table', ['dealer' => $dealer])->render();
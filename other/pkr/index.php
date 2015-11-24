<?php
require_once "Card.php";
require_once "Deck.php";
require_once "Dealer.php";
require_once "DecksFactory.php";

$deckFactory = new DecksFactory(require_once 'cardsData.php');

try {
    $deck = $deckFactory->createDeck();
    $dealer = new Dealer($deck);
    $dealer->shuffleDeck();

    for ($i = 0; $i < 2; $i++) {
        echo '<div style="display: inline-block; margin-right: 20px; border: 1px solid black; border-radius: 2px; padding: 5px; 10px;">';
        $dealer->dealCard();
        $dealer->dealCard();
        echo '</div>';
    }

    echo '<br /><br /><div style="display: inline-block; margin-right: 20px; border: 1px solid black; border-radius: 2px; padding: 5px; 10px;">';
    $dealer->dealFlop();
    echo '</div>';

    echo '<div style="display: inline-block; margin-right: 20px; border: 1px solid black; border-radius: 2px; padding: 5px; 10px;">';
    $dealer->dealCard();
    echo '</div>';

    echo '<div style="display: inline-block; margin-right: 20px; border: 1px solid black; border-radius: 2px; padding: 5px; 10px;">';
    $dealer->dealCard();
    echo '</div>';

    echo $dealer->getDeckCount();

} catch (Exception $e) {
    echo $e->getMessage();
}
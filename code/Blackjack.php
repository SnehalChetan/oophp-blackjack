<?php

declare(strict_types=1);


/**
 *  need player and deck class here
 
*require  './code/Deck.php';
*require  './code/Player.php';
*/

/*
* create class Blackjack
*/
class Blackjack{

    private Player $player;
    private Player $dealer ;
    private Deck $deck;

    Public function __construct(Player $player,Player $dealer, Deck $deck)
    {
        $this->player = $player;
        $this->dealer = $dealer;
        $this->deck = $deck;
    }

    /*
    *getPlayer (returns the player object)
    getDealer (returns the dealer object)
    getDeck (returns the deck object)
    */

    public function getPlayer() : Player{

        return $this->player;
    }

    public function getDealer() : Player{

        return $this->dealer;
    }

    public function getDeck() : Deck{

        return $this->deck;
    }
}

$deck = new Deck();
$player = new Player($deck);
$dealer = new Player($deck);

$deck->shuffle();
$blackjack = new Blackjack($player,$dealer,$deck);
// echo "<pre/>";
// var_dump($blackjack);
// exit;

$_SESSION["game"] = $blackjack;
?>
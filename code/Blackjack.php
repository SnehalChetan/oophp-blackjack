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

    Public function __construct()
    {
        $this->deck = new Deck();
        $this->deck->shuffle();
        $this->player = new Player($this->deck);
        $this->dealer = new Dealer($this->deck);
    }

    /*
    *getPlayer (returns the player object)
    getDealer (returns the dealer object)
    getDeck (returns the deck object)
    */

    public function getPlayer() : Player{

        return $this->player;
    }

    public function getDealer() : Dealer{

        return $this->dealer;
    }

    public function getDeck() : Deck{

        return $this->deck;
    }
}

?>
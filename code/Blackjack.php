<?php

declare(strict_types=1);

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

$this->deck = new Deck();
        $this->deck->shuffle();
        $this->player = new Player($this->deck);
        $this->dealer = new Player($this->deck);


$deck = new Deck();
$player = new Player($deck);
$dealer = new Player($deck);

$deck->shuffle();
$blackjack = new Blackjack($player,$dealer,$deck);
?>
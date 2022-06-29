<?php

declare(strict_types=1);


/**
 * create player class with private properties
 * cards (array)
 * lost (bool, default = false)
 */

class Player{
    protected array $cards = [];
    protected bool $lost = false;
    protected int $score = 0;

    public function __construct(Deck $deck)
    {
        array_push($this->cards,$deck->drawCard());
        array_push($this->cards,$deck->drawCard());
       
    }
    /**
     * create methods for players
     * `hit`, `surrender`, `getScore`, `hasLost`
     */

    public function hit(Deck $deck):void
    {
        array_push($this->cards, $deck->drawCard());
        if ($this->getScore() > 21){
            $this->lost = true;
        }
    }

    public function surrender():bool
    { 
        $this->lost = true;
        return $this->lost;
        
    }
/**
 * Calculate the total value of cards player has
 * Each element of cards array is a element of deck class and 
 * the Deck class calls cards class object in the it's cards array property
 * 
 */
    public function getScore():int
    {
        $this->score = 0;
        foreach ($this->cards as $key => $card){
            $this->score += $card->getValue();
        }
        return $this->score;
    
    }
    
    public function hasLost():bool
    {
        return $this->lost;
    }

    public function getCards(): array
    {
        return $this->cards;
    }

}

class Dealer extends Player
{
    public function hit(Deck $deck):void
    {
        while ($this->getScore()<15){
            parent::hit($deck);
        }
    }
}
?>


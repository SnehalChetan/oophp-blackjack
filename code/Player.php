<?php

declare(strict_types=1);


/**
 * create player class with private properties
 * cards (array)
 * lost (bool, default = false)
 */

class Player{
    private array $cards = [];
    private bool $lost = false;

    public function __construct(Deck $deck)
    {
        $this->cards[] = $deck->drawCard();
        $this->cards[] = $deck->drawCard();
       
    }
    /**
     * create methods for players
     * `hit`, `surrender`, `getScore`, `hasLost`
     */

    public function hit():void
    {
        $this->cards = $this->deck->drawCard();
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
        $score = 0;
        forEach($this->cards as $cardValue){
             
             $score = $score + $cardValue->getValue();
        }

        return $score;
    
    }
    
    public function hasLost():bool
    {
        return $this->lost;
    }


}

?>


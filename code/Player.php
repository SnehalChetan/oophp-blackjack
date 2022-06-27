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
        $this->deck = $deck;
       
    }
    /**
     * create methods for players
     * `hit`, `surrender`, `getScore`, `hasLost`
     */

    public function hit():void{     }

    public function surrender():bool
    { 
        $this->lost = true;
        return $this->lost;
        
    }

    public function getScore():void
    {
        // forEach($cards as card){
        //     $score = 
        // }
    
    }
    
    public function hasLost():bool
    {

        return $this->lost;
    }


}

?>


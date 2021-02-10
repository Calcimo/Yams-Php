<?php
declare(strict_types = 1);
require_once "Dice.class.php";
require_once "DiceRoll.class.php";
require_once "Combination.class.php";

class LuckCombination extends Combination{

    public function __construct(){
        parent::__construct("Luck");
    }
    
   public function computeScore($jetDeDes): int
    {
        $res = 0;
        for ($i=0;$i< $jetDeDes->getCount();$i++)
            {
                $res = $res+ $jetDeDes->getDice($i)->getValue();
            }

        return $res;
    }
    
}
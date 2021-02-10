declare(strict_types = 1);
<?php
require_once "Dice.class.php";
require_once "DiceRoll.class.php";
require_once "Combination.class.php";
require_once "SameCombination.class.php";

class YamsCombination extends SameCombination{

    public function __contruct(){
        parent::__construct("Yams",5);
    }
    public function computeScore(DiceRoll $monDiceRoll):int{
        $retour = 0;
        if (parent::computeScore($monDiceRoll)>0){
            $retour = 50;
        }
        return $retour;
    }
}

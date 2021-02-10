<?php
declare(strict_types = 1);
require_once "Dice.class.php";
require_once "DiceRoll.class.php";
require_once "Combination.class.php";

class FullCombination extends Combination{

    public function __construct(){
        parent::__construct("Full");
    }

    public function computeScore(DiceRoll $jetDeDes):int
    {
        $paire = False;
        $brelan = False;
        $frequenceApp = $jetDeDes->computeFrequencies();
        foreach($frequenceApp as $valeur => $frequence)
        {
            if($frequence == 2)
            {
                $paire = True;
            }
            elseif($frequence == 3)
            {
                $brelan = True;
            }
        }
        if($paire && $brelan)
            $somme = 25;
        else
            $somme = 0;
        return $somme;
    }
    
}

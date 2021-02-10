<?php
declare(strict_types = 1);
require_once "Dice.class.php";
require_once "DiceRoll.class.php";
require_once "Combination.class.php";

class StraightCombination extends Combination{
    private $straightLenght; //int
    private $scoreValue; //int

    public function __construct(String $name, int $straightLenght, int $scoreValue){
        parent::__construct($name);
        if ($straightLenght < 0 or $scoreValue < 0){
            throw new InvalidArgumentException("Une des deux valeur n'est pas valide");
        }
        $this->straightLenght = $straightLenght;
        $this->scoreValue = $scoreValue;
    }
    
    public function computeScore(DiceRoll $jetDeDes):int{
        $long = 0; 
        $longMax = 0;
        $freq = $jetDeDes->computeFrequencies();
        foreach ($freq as $num){
            if ($num>0){
                $long +=1;
                if ($longMax < $long){
                    $longMax = $long;
                }
            }
            else{
                $long = 0;
            }
        }
        if ($longMax >= $this->straightLenght){
            return $this->scoreValue;
        }
        else {
            return 0;
        }
    }
    
}

declare(strict_types = 1);
<?php
require_once "Dice.class.php";
require_once "DiceRoll.class.php";
require_once "Combination.class.php";

class SameCombination extends Combination{
    private $sameCount; //int

    public function __construct(String $name, int $sameCount){
        parent::__construct($name);
        if ($sameCount<3 or $sameCount>5){
            throw new InvalidArgumentException("Le paramètre sameCount doit être supérieur à 2 et inférieur à 5");
        }
        $this->sameCount = $sameCount;
    }

    public function computeScore(DiceRoll $jetDeDes):int{
        $numMax = 0;
        $nbMax = 0;
        $freq = $jetDeDes->computeFrequencies();
        foreach ($freq as $num=>$nombre){
            if ($nombre > $nbMax){
                $nbMax = $nombre;
                $numMax = $num;
            }
        }
        if ($nbMax >= $this->sameCount){
            return $numMax*$this->sameCount;
        }
        else {
            return 0;
        }
    }
}

<?php
declare(strict_types = 1);
require_once "Dice.class.php";
require_once "DiceRoll.class.php";
require_once "Combination.class.php";

class NumberCombination extends Combination{

    private $number; //int

    public function __construct(int $number){
        if ($number < 1 or $number > 6){
            throw new InvalidArgumentexception("Le nombre choisi pour comptabiliser les dés n'est pas valide");
        }
        parent::__construct("Nombre de ".$number);
        $this->number=$number;
    }

    public function computeScore(DiceRoll $jetDeDes):int{
        $tab = $jetDeDes->computeFrequencies();
        return $this->number*$tab[$this->number];
    }
}

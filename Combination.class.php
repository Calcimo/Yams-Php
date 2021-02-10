<?php
declare(strict_types = 1);
require_once "Dice.class.php";
require_once "DiceRoll.class.php";

abstract class Combination{

    private $nom; //String
    private $score; //int

    public function __construct(String $nom){
        $this->nom = $nom;
        $this->score = -1;
    }

    public function getName():String{
        return $this->nom;
    }

    public function getScore():int{
        return $this->score;
    }

    abstract public function computeScore(DiceRoll $jetDeDes):int;

    public function updateScore(DiceRoll $jetDeDes){
        $this->score = $this->computeScore($jetDeDes);
    }

    public function __toString() : string {
        return sprintf("%15s : ", $this->nom) .
        ($this->score > -1 ? $this->score : "-");
        }
}


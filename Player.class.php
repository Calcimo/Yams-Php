<?php
declare(strict_types = 1);
require_once "Dice.class.php";
require_once "DiceRoll.class.php";
require_once "Combination.class.php";
require_once "LuckCombination.class.php";
require_once "FullCombination.class.php";
require_once "NumberCombination.class.php";
require_once "StraightCombination.class.php";
require_once "SameCombination.class.php";
require_once "YamsCombination.class.php";

class Player {
    private $name; //String
    private $score; //int
    private $combinations; //array
    private $emptyCombination; //int


    public function __construct(String $name){
        $this->name=$name;
        $this->score = 0;
        $this->emptyCombination = 13;
        $this->combinations = array($NumberCombination1 = new NumberCombination(1),
                                    $NumberCombination2 = new NumberCombination(2),
                                    $NumberCombination3 = new NumberCombination(3),
                                    $NumberCombination4 = new NumberCombination(4),
                                    $NumberCombination5 = new NumberCombination(5),
                                    $NumberCombination6 = new NumberCombination(6),
                                    $brelan = new SameCombination("Brelan",3),
                                    $carre = new SameCombination("Carre",4),
                                    $FullCombination = new FullCombination(),
                                    $petiteSuite = new straightCombination("Petite Suite",4,30),
                                    $grandeSuite = new straightCombination("Grande Suite",5,40),
                                    $YamsCombination = new YamsCombination("Yams",5),
                                    $LuckCombination = new LuckCombination());

    }

    public function getName():String{
        return $this->name;
    }

    public function getScore():int{
        return $this->score;
    }

    public function isFinished():bool{
        $retour = False;
        if ($this->emptyCombination <= 0){
            $retour = True;
        }
        return $retour;
    }

    public function getCombinationName(int $index):String{
        if ($index>count($this->combinations) or $index < 0){
            throw new OutOfRangeException("L'indice n'est pas valide pour le tableau combinations.");
        }
        return $this->combinations[$index]->getName();
    }

    public function playCombinaison(DiceRoll $jetDeDes, int $index):bool{
        $retour = False;
        if ($index > 0 and $index < count($this->combinations)+1){
            if ($this->combinations[$index-1]->getScore() == -1){
                $this->combinations[$index-1]->updateScore($jetDeDes);
                $this->score = $this->score + $this->combinations[$index-1]->getScore();
                $this->emptyCombination -= 1;
                $retour = True;
            }
        }
        return $retour;
    }
    
    public function determineBonus():int{
        $retour = 0;
        $total = 0;
        for($i = 0; $i < 6; $i++){
            $total += $this->combinations[$i]->getScore();
        }
        if ($total > 63){
            $retour = 35;
        }
        return $retour;
    }


    public function __toString():String{
        $res =  "           JOUEUR : ".$this->getName()."\n----------------------------------------\n";
        for($i = 0; $i < count($this->combinations);$i++){
            $num = $i+1;

            if ($num >9){
                $espace = "";
            }
            else{
                $espace = " ";
            }

            if ($this->combinations[$i]->getScore()==-1){
                $affich = "-";
            }
            else{
                $affich = $this->combinations[$i]->getScore();
            }

            $longMax = strlen($this->getCombinationName(10));
            $long =strlen($this->getCombinationName($i));
            $esp = "";
            for ($j=0;$j<$longMax-$long;$j++){
                $esp.=" ";
            }

            $res .=$espace.$num."   ".$esp.$this->getCombinationName($i)." : ".$affich."\n";
        }
        $res .= "----------------------------------------\n            TOTAL : ".$this->getScore();
        return $res;
    }


}

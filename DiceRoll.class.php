<?php
declare(strict_types = 1);

class DiceRoll
{
    private $rollCount; //int
    private $roll; //array 

    public function __construct(int $nbRoll){
        $this->rollCount = 1;
        $this->roll = array();
        if ($nbRoll > 1){

            for ($i=0;$i<$nbRoll;$i++){
                array_push($this->roll, new Dice());
            }
    
    }
        elseif ($rollCount < 1){
            throw new InvalidArgumentException("La valeur n'est pas comprise entre 1 et 6");
        }
}

    public function getRollCount():int{
        return $this->rollCount;
    }

    public function getCount():int{
        return count($this->roll);
    }

    public function getDice(int $index){
        
        if (($index < 0) or ($index >= $this->getCount())){
            throw new OutOfRangeException("L'indice est invalide");
        }
    
        return $this->roll[$index];
    }

    public function reRoll(array $selection){
        if (count($selection) != $this->getCount()){
            throw new InvalidArgumentException("La taille du tableau est invalide");
        }
        else{
            $verif = False;
            for ($i=0;$i <$this->getCount();$i++){
                if ($selection[$i]==True){
                    $this->roll[$i]->roll();
                    $verif = True;
                }
            }
            if ($verif == True){
                $this->rollCount += 1;
            }
        }
    }

    public function computeFrequencies():array{
        $tableau = array(1=>0,2=>0,3=>0,4=>0,5=>0,6=>0);
        foreach($this->roll as $des){
            foreach($tableau as $indice=>$valeur){
                if ($des->getValue() == $indice){
                    $tableau[$indice] += 1;
                }
            }
        }
        return $tableau;
    }

    public function __toString():String{
        $retour = "";
        $compteur = 0;
        $lettre = ["A","B","C","D","E","F"];
        for ($i =0;$i < $this->getCount();$i++){
            $compteur += 1;
            $retour .= $this->getDice($i)." ";
        }
        $retour .= "\n";
        for ($i =0;$i<$compteur;$i++){
            $retour .= $lettre[$i]." "; 
        }
        return $retour;
    }

    public function setRoll(array $tab){
        $this->roll = $tab;
    }

}


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
require_once "Player.class.php";

class SingleGame {
    private $player; //Player

    public function __construct(String $name){
        $this->player = new Player($name);
    }

    public function enterChoice(String $consignes):String{
        $retour = strtoupper(readline($consignes));
        $retour = str_replace(' ','',$retour);
        return $retour;
    }

    public function getNumber(String $chaine):int{
        if (is_numeric($chaine)==False){
            throw new InvalidArgumentException("Le paramètre doit être numérique");
        }
        else {
            $retour = intval($chaine);
        }
        return $retour;
    }

    public function identifyDiceToRaise(String $choice, int $rollSize):array{
        $alphabet="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $retour = [];
        $verif = False;
        for ($i=0;$i<strlen($choice);$i++){
            $correspond = False;
            for ($j=0;$j<strlen($alphabet);$j++){
                if($choice[$i]==$alphabet[$j]){
                    $correspond = True;
                }
            }
            if($correspond == False){
                $verif = True;
            }
        }
        if ($verif){
            throw new InvalidArgumentException("Saisie incorrecte :Caractère(s) invalide(s).");
        }
        else {
            for ($i = 0;$i<$rollSize;$i++){
                $retour[]=False;
            }
            for ($i=0;$i<$rollSize;$i++){
                $verif = False;
                if ($i<strlen($choice)){
                    for ($j=0;$j<strlen($alphabet);$j++){
                        if ($choice[$i]==$alphabet[$j]){
                            $retour[$j] = True;
                        }
                    }
                }
            }
        }
        return $retour;
    }

    public function simulateGameTurn(){
        echo $this->player."\n";
        $testRoll = new DiceRoll(5);
        $compteurLance = 1;
        $veriFig = False;
        while ($compteurLance<=3 and $veriFig == False){
            echo $testRoll."\n";

            if ($compteurLance < 3){
                $choix = $this->enterChoice("Saisir un numéro de combinaison non remplie (1-13) ou les lettres des dés à lancer sans espace (ABCDE) :");
            }
            else{
                $choix = $this->enterChoice("Saisir un numéro de combinaison non remplie (1-13) :");
            }
            try{
                if ($this->player->playCombinaison($testRoll,$this->getNumber($choix))){
                    $choix = $this->getNumber($choix);
                    $veriFig = True;
                }
                else {
                    echo "Numéro de combinaison incorrect\n";
                }
            }
            catch (InvalidArgumentException $e){
                if ($compteurLance < 3){
                    try 
                    {
                        $relancer = $this->identifyDiceToRaise($choix,5);
                        $testRoll->reRoll($relancer);
                        $compteurLance += 1;
                    }
                    catch (InvalidArgumentException $exception)
                    {
                        echo $exception->getMessage()."\n";
                    }  
                }
                else {
                    echo "Vous ne pouvez plus jouer.\n";
                    }
            }
        }
    }

    public function simulateGame(){
        while ($this->player->isFinished()==False){
            $this->simulateGameTurn();
        }
        $bonus = $this->player->determineBonus();
        $score = $this->player->getScore();
        $total = $score + $bonus;
        echo "Le score total de ".$this->player->getName()." est de : ".$total." points.\n";
    }
}




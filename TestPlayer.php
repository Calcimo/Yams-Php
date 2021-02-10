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

function decodeBooleen(bool $valCodee):string{
    if ($valCodee == TRUE) {
        $sortie = "oui"."\n";
    }
    else{
        $sortie = "non"."\n";
    }

    return $sortie;
}


//Question 45

$Player = new Player("Joueur");

var_dump($Player);

//Question 46

echo $Player->getScore()."\n";
echo $Player->getName()."\n";

//Question 47

echo decodeBooleen($Player->isFinished())."\n";

// Question 48

echo $Player->getCombinationName(6)."\n";

//Question 49

$diceRoll = new DiceRoll(5);
echo $diceRoll."\n";
echo decodeBooleen($Player->playCombinaison($diceRoll,0));

echo $Player->getScore()."\n";

$diceRoll->setRoll([new Dice(1),new Dice(1),new Dice(1),new Dice(1),new Dice(1)]);
echo decodeBooleen($Player->playCombinaison($diceRoll,11));

echo $Player->getScore()."\n";

//Question 50
$Player1 = new Player("Joueur1");
$monDiceRoll = new DiceRoll(5);
$monDiceRoll->setRoll([new Dice(1),new Dice(1),new Dice(1),new Dice(1),new Dice(1)]);
echo decodeBooleen($Player1->playCombinaison($monDiceRoll,1));
$monDiceRoll->setRoll([new Dice(1),new Dice(1),new Dice(2),new Dice(2),new Dice(2)]);
echo decodeBooleen($Player1->playCombinaison($monDiceRoll,2));
$monDiceRoll->setRoll([new Dice(1),new Dice(1),new Dice(3),new Dice(3),new Dice(3)]);
echo decodeBooleen($Player1->playCombinaison($monDiceRoll,3));
$monDiceRoll->setRoll([new Dice(1),new Dice(1),new Dice(4),new Dice(4),new Dice(4)]);
echo decodeBooleen($Player1->playCombinaison($monDiceRoll,4));
$monDiceRoll->setRoll([new Dice(1),new Dice(1),new Dice(5),new Dice(5),new Dice(5)]);
echo decodeBooleen($Player1->playCombinaison($monDiceRoll,5));
$monDiceRoll->setRoll([new Dice(1),new Dice(1),new Dice(6),new Dice(6),new Dice(6)]);
echo decodeBooleen($Player1->playCombinaison($monDiceRoll,6));

echo $Player1->getScore()."\n";
echo $Player1->determineBonus()."\n";

//Question 51

echo $Player1."\n";

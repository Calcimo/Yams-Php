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
require_once "SingleGame.class.php";

//Question 53

$SingleGame = new SingleGame("bob");

//var_dump($SingleGame);

//Question 54

//echo $maSingleGame->enterChoice("Faites un truc :")."\n";

//var_dump($SingleGame->getNumber("14298"));

//Question 55

//var_dump($SingleGame->identifyDiceToRaise("ABDH",8));

//Question 56

//$SingleGame->simulateGameTurn();

//Question 57

$SingleGame->simulateGame();

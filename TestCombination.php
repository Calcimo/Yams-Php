<?php
declare(strict_types = 1);
require_once "Dice.class.php";
require_once "DiceRoll.class.php";
require_once "Combination.class.php";

//Question 16

$testCombi = new Combination("test");
var_dump($testCombi);

//Question 17

echo $testCombi->getName()."\n";
echo $testCombi->getScore()."\n";

//Question 18

$testDiceRoll = new DiceRoll(4);

//Question 19
$testCombi->updateScore($testDiceRoll);

//Question 20
echo $testCombi;
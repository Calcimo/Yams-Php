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

//Question 21

/* Il est inutile de définir les attributs d'instace car ils sont déjà définis dans la classe mère Combination. */

//Question 22

$testLuckCombination = new LuckCombination("test");

var_dump($testLuckCombination);

/* Il est possible d'instancier un objet de LuckCombination grâce au constructeur déjà présent dans la classe mère */

//Question 23

$mtestLuckCombination = new LuckCombination();

//Question 24

$testDiceRoll = new DiceRoll(5);

echo $testLuckCombination->computeScore($testDiceRoll)."\n";

//Question 27

$testFull = new FullCombination();
var_dump($testFull);

//Question 28

var_dump($testDiceRoll);
echo $testFull->computeScore($testDiceRoll)."\n";

//Question 30

$testNumberCombination = new NumberCombination(3);
var_dump($testNumberCombination);

//Question 31

echo $testNumberCombination->computeScore($testDiceRoll)."\n";

//Question 33

$testStraightCombination = new StraightCombination("Suite",4,40);
var_dump($testStraightCombination);

//Question 34

var_dump($testDiceRoll->computeFrequencies());
echo "\n".$testStraightCombination->computeScore($testDiceRoll)."\n";

//Question 36

$testSameCombination = new SameCombination("Brelan",3);
var_dump($testSameCombination);

//Question 37

var_dump($testDiceRoll->computeFrequencies());
echo $testSameCombination->computeScore($testDiceRoll)."\n";

//Question 39

$testYamsCombination = new YamsCombination("Yams",5);
var_dump($testYamsCombination);

//Question 40
$testDiceRoll->reRoll([new Dice(3),new Dice(3),new Dice(3),new Dice(3),new Dice(3)]);
var_dump($testDiceRoll->computeFrequencies());
echo $testYamsCombination->computeScore($testDiceRoll)."\n";

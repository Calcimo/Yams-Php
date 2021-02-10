<?php
declare(strict_types = 1);
require_once "DiceRoll.class.php";
require_once "Dice.class.php";

//Question 8
$test = new DiceRoll(5);
var_dump($test);

//Question 9
echo $test->getRollCount()."\n";

//Question 10
echo $test->getCount()."\n";

//Question 11
echo $test->getDice(1);

//Question 12
$test->reRoll([True,False,False,False,True]);

var_dump($test);

//Question 13
$testTab = $test->computeFrequencies();
var_dump($testTab);

//Question 14
echo $test."\n";
<?php
declare(strict_types = 1);
require_once "Dice.class.php";


//Question 2
$test = new Dice(1); 
var_dump($test);

//Question 3
$test2 = new Dice();
var_dump($test2);

//Question 4
echo $test2->getValue()."\n";

//Question 5
$test->roll();
var_dump($test);

//Question 6
echo $test;




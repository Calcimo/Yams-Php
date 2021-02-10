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

//Question 25

$chance = new LuckCombination();
//$figure = new Combination("figure");

echo $chance."\n";
echo $figure."\n";

$jetDeDes = new DiceRoll(4);

//echo $figure->computeScore($jetDeDes)."\n";
echo $chance->computeScore($jetDeDes)."\n";

/*Le résultat de computeScore pour $figure est toujours égal à -2 car la méthode défini dans la classe mère retourne toujours -2.
Dans le cas de $chance, on utilise bien la somme de tous les dés de DiceRoll car la méthode de la classe $chance retourne ceci.
*/

$combinaisons = array(//$figure,
                        $chance);
foreach($combinaisons as $combi){
    echo $combi->computeScore($jetDeDes)."\n";
}

/*Le résultat de computeScore pour $figure est toujours égal à -2 car la méthode défini dans la classe mère retourne toujours -2.
Dans le cas de $chance, on utilise bien la somme de tous les dés de DiceRoll car la méthode de la classe $chance retourne ceci.
*/

/*
Le polymorphisme est le fait qu'un objet d'une classe mère puisse contenir un objet de classe fille et donc que lors de l'utilisation de méthode
d'une classe mère, le système va rechercher dans l'objet sa vraie nature afin d'utiliser la méthode appropriée.
*/

//Question 41

$testCombinaisons =[$testLuckCombination = new LuckCombination(),
                    $testSameCombination = new SameCombination("Brelan",3),
                    $testFullCombination = new FullCombination(),
                    $testYamsCombination = new YamsCombination("Yams",5),
                    $testNumberCombination = new NumberCombination(5),
                    //$testCombination = new Combation("test"),
                    $testStraightCombination = new straightCombination("Petite Suite",4,30),];

var_dump($testCombinaisons);

foreach($testCombinaisons as $combin){
    $jetDeDes = new DiceRoll(5);
    echo $jetDeDes."\n";
    echo $combin->computeScore($jetDeDes)."\n";
}
//Question 42

/* On n'a pas le droit car combination n'est pas une classe abstraite, il faut donc rendre cette classe abstraite.
Non on ne peut pas instancier un objet de la calsse classe Combination car c'est une classe abstraite.
Rendre computeScore en méthode abstraite ne change rien car lors de l'exécution de la méthode computeScore, la méthode appropriée à la classe fille est utilisée

//Question 43

On constate que la méthode computeScore étant abstraite dans la classe combination l'est également dans Luckcombination. LuckCombination devient alors une classe abstraite et ne peut plus être instancié. 
Lorsqu'une classe mère devient abstraite, l'ensemble de ses classes filles deviennent abstraite également.*/

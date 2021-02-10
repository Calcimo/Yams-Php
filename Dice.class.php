<?php
declare(strict_types = 1);

class Dice
{
    private $value; //int

    public function __construct(int $value=-1){
        if ($value == -1){
            $this->value = rand(1,6);
        }
        else{
            if (($value < 1) or ($value >6)){
                throw new InvalidArgumentException("La valeur n'est pas comprise entre 1 et 6");
            }
            else{
                $this->value = $value;
            }
    }
}

    public function getValue():int {
        return $this->value;
    }

    public function roll(){
        $this->value = rand(1,6);
    }

    public function __toString():String{
        return (string)$this->value;
    }

    

}

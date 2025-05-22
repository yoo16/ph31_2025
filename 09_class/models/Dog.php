<?php 
require_once "Animal.php";

class Dog extends Animal
{
    
    public string $crying = "わん！";
    public string $type = "dog";

    public function eat(string $something)
    {
        echo "{$this->name}が、シッポをふって{$something}を食べている";
    }

    public function pawAndEat(string $something)
    {
        echo "おて！";
        echo "よし！";
        parent::eat($something);
    }

}
?>
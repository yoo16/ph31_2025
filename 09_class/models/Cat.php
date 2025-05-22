<?php 
require_once "Animal.php";

class Cat extends Animal
{
    public string $crying = "にゃー！";
    public string $type = "cat";

    // オーバーライド
    public function eat(string $something)
    {
        echo "{$this->name}が、警戒して{$something}を食べている";
    }
}
?>
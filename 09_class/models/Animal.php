<?php
// require_once 'AnimalAbstract.php';
require_once 'IAnimal.php';
require_once 'GameCharacterable.php';

class Animal implements IAnimal, GameCharacterable
{
    // コンストラクタ
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    // プロパティ
    // 名前
    public string $name;
    // 種別
    public string $type;
    // 鳴き声
    public string $crying;

    // クラスメソッド
    public function run()
    {
        echo "{$this->name}が走った！";
    }

    public function eat(string $something)
    {
        echo "{$this->name}が{$something}を食べた！";
    }

    public function cry()
    {
        echo $this->crying;
    }

    public function greet(Animal $animal)
    {
        $message = "【{$this->name}】{$animal->name}さん、こんにちは！";
        echo $message;
    }
}

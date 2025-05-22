<?php
require_once "models/Animal.php";
require_once "models/Cat.php";
require_once "models/Dog.php";

// TODO: Animalインスタンス生成
$animal = new Animal("ジロー");
// TODO: Animal の type 設定
$animal->type = "lion";
// TODO: Animal の crying 設定
$animal->crying = "がおー！";

// TODO: Catインスタンス生成: 名前を指定
$cat1 = new Cat("タマ");
// TODO: Catインスタンスの image プロパティに画像のパスを指定: images/cat1.png
$cat1->image = "images/cat1.png";

$cat2 = new Cat("ミケ");
$cat2->image = "images/cat2.png";

$dog1 = new Dog("タロー");
$dog1->image = "images/dog1.png";

$dog2 = new Dog("ボブ");
$dog2->image = "images/dog2.png";

// 多様性（ポリモーフィズム）
$animals = [
    $cat2,
    $dog2,
];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>動物の多様性</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 font-sans">

    <div class="max-w-3xl mx-auto p-6">
        <div class="space-y-4 mb-10">
            <h2 class="text-3xl font-bold mb-6 text-center text-blue-600">Animalクラス</h2>
            <div class="bg-white p-4 rounded shadow-md">
                <div class="my-2">
                    <label class="text-xs px-3 py-1 bg-green-500 text-white rounded">
                        <!-- TODO: animal.name 表示 -->
                        <?= $animal->name ?>
                        <!-- TODO: animal.type 表示 -->
                        (<?= $animal->type ?>)
                    </label>
                </div>
                <div>
                    <!-- TODO: animal.cry() 実行 -->
                    <?php $animal->cry() ?><br>
                    <!-- TODO: animal.run() 実行 -->
                    <?php $animal->run() ?><br>
                </div>
            </div>
        </div>


        <div class="space-y-4 mb-10">
            <h2 class="text-3xl font-bold mb-6 text-center text-blue-600">Dogクラス</h2>
            <div class="bg-white p-4 rounded shadow-md">
                <div class="my-2 flex items-center space-x-4">
                    <!-- TODO: dog1.image を表示 -->
                    <img src="<?= $dog1->image ?>" class="w-16 h-16 rounded-full">
                    <label class="text-xs px-3 py-1 bg-green-500 text-white rounded">
                        <?= $dog1->name ?>
                        (<?= $dog1->type ?>)
                    </label>
                </div>
                <div>
                    <?php $dog1->cry() ?><br>
                    <?php $dog1->run() ?><br>
                    <!-- TODO: dog1.eat() 実行 -->
                    <?php $dog1->eat('お肉') ?><br>
                </div>
            </div>
        </div>

        <div class="space-y-4 mb-10">
            <h2 class="text-3xl font-bold mb-6 text-center text-blue-600">Catクラス</h2>
            <div class="bg-white p-4 rounded shadow-md">
                <div class="my-2 flex items-center space-x-4">
                    <img src="<?= $cat2->image ?>" class="w-16 h-16 rounded-full">
                    <label class="text-xs px-3 py-1 bg-green-500 text-white rounded">
                        <?= $cat2->name ?>
                        (<?= $cat2->type ?>)
                    </label>
                </div>
                <div>
                    <?php $cat2->cry() ?><br>
                    <!-- TODO: cat2.greet() 実行 -->
                    <?php $cat2->greet($dog1) ?><br>
                    <!-- TODO: cat2.eat() 実行 -->
                    <?php $cat2->eat('チャウチュール')  ?><br>
                </div>
            </div>
        </div>

        <div class="space-y-4 mb-10">
            <h2 class="text-3xl font-bold mb-6 text-center text-blue-600">動物の多様性（ポリモーフィズム）</h2>
            <?php foreach ($animals as $animal): ?>
                <div class="bg-white p-4 rounded shadow-md">
                    <div class="my-2 flex items-center space-x-4">
                        <img src="<?= $animal->image ?>" class="w-16 h-16 rounded-full">
                        <label class="text-xs px-3 py-1 bg-green-500 text-white rounded">
                            <?= $animal->name ?>
                            (<?= $animal->type ?>)
                        </label>
                    </div>
                    <div>
                        <?php $animal->cry() ?><br>
                        <?php $animal->run() ?>
                    </div>
                </div>
            <?php endforeach ?>

        </div>

    </div>

</body>

</html>
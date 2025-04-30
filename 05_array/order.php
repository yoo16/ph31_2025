<?php
$selectIndex = 1;

// オブジェクト形式の配列（各アイテムを連想配列で表現）
$items = [
    [
        'name' => 'コーラ',
        'price' => 400,
        'image' => 'images/cola.webp'
    ],
    [
        'name' => 'オレンジジュース',
        'price' => 500,
        'image' => 'images/orange.webp'
    ],
    [
        'name' => '紅茶',
        'price' => 450,
        'image' => 'images/tea.webp'
    ]
];

// TODO: 選択された商品
$selected = [];
?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>配列</title>
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="container mx-auto p-4">
        <h1 class="text-2xl text-center font-bold p-3">オーダー選択</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="border border-gray-200 rounded overflow-hidden">
                <!-- TODO: 画像表示 -->
                <img src="" class="w-full object-cover">
                <div class="p-4">
                    <!-- TODO: 商品名表示  -->
                    <h2 class="font-bold mb-2"></h2>
                    <!-- TODO: 価格表示 -->
                    <p>
                        &yen;
                    </p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
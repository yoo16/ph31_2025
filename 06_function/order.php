<?php
// 商品データ（連想配列）
$products = [
    [
        "name" => "コーラ",
        "price" => 400,
        "image" => "images/cola.webp",
    ],
    [
        "name" => "オレンジジュース",
        "price" => 500,
        "image" => "images/orange.webp",
    ],
    [
        "name" => "紅茶",
        "price" => 450,
        "image" => "images/tea.webp",
    ],
];

// 合計金額の計算
function calculateTotalPrice(array $products)
{
    $total = 0;
    // TODO: 合計金額を計算
    // foreach ($products as $product) {
    //     $total += $product['price'];
    // }
    $total = array_sum(array_column($products, 'price'));
    return $total;
}

// ポイント計算（デフォルト10%）
function calculatePoint(int $price, float $rate = 0.1)
{
    // TODO: ポイント計算
    $point = $price * $rate;
    return $point;
}

// 計算実行
$totalPrice = calculateTotalPrice($products);
$point = calculatePoint($totalPrice);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>オーダー</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <main class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-6">商品一覧</h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <?php foreach ($products as $product): ?>
                <div class="bg-white rounded-xl shadow overflow-hidden">
                    <img src="<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold mb-2"><?= $product['name'] ?></h2>
                        <p class="text-gray-700">&yen;<?= number_format($product['price']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-10 bg-white rounded-xl shadow p-6 mx-auto">
            <h2 class="text-xl font-bold mb-4">
                合計:
                &yen;<?= number_format($totalPrice) ?>
            </h2>
            <p class="text-lg mt-2">ポイント (10%): <span class="text-green-600"><?= number_format($point, 1) ?>pt</span></p>
        </div>
    </main>
</body>

</html>
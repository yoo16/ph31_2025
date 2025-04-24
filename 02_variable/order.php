<?php
// 変数
// TODO: drink1, drink2, drink3に商品名を代入
$drink1 = "コーラ";
$drink2 = "オレンジジュース";
$drink3 = "紅茶";

// TODO: image1, image2, image3に画像ファイル名を代入
$image1 = "images/cola.webp";
$image2 = "images/orange.webp";
$image3 = "images/tea.webp";

// TODO: price1, price2, price3に価格を代入

// TODO: quantity1, quantity2, quantity3に個数を代入
$quantity1 = 0;
$quantity2 = 0;
$quantity3 = 0;

// T0D0: 定数：割引率
const DISCOUNT_RATE = 0;
const POINT_RATE = 0;

// 演算
// TODO: quantity1をインクリメント

// TODO: quantity3をデクリメント

// TODO: amount1, amount2, amount3に「価格 x 個数」を代入
$amount1 = 0;
$amount2 = 0;
$amount3 = 0;

// TODO: 通常合計価格
$total = 0;

// TODO: 会員フラグ (true/false)
$isMember;

// 三項演算
// TODO: isMember が true :会員、false: 非会員
$memberLabel = "会員";

// TODO: 会員の場合、割引率を DISCOUNT_RATE に設定
$discountRate = 0;

// 割引額
$discount = $total * $discountRate;

// 合計金額
$totalWithDiscount = $total - $discount;

// 獲得ポイント: totalWithDiscount x POINT_RATE (小数点切り下げ)
$point = 0;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>変数と定数</title>
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="container mx-auto p-4">
        <h1 class="text-2xl text-center font-bold p-3">オーダー</h1>
        <div class="p-2 text-center text-sm">
            会員フラグ: <span class="px-2 py-1 bg-emerald-400 text-white rounded-sm"><?= $memberLabel ?></span>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div class="border border-gray-200 rounded overflow-hidden">
                <img src="<?= $image1; ?>" alt="<?= $drink1; ?>" class="w-full object-cover">
                <div class="p-4">
                    <h2 class="font-bold mb-2"><?= $drink1; ?></h2>
                    <p>
                        &yen;<?= $price1; ?> 
                        x 
                        <?= $quantity1 ?>
                    </p>
                </div>
            </div>
            <div class="border border-gray-200 rounded overflow-hidden">
                <img src="<?= $image2; ?>" alt="<?= $drink2; ?>" class="w-full object-cover">
                <div class="p-4">
                    <h2 class="font-bold mb-2"><?= $drink2; ?></h2>
                    <p>
                        &yen;<?= $price2; ?> 
                        x 
                        <?= $quantity2 ?>
                    </p>
                </div>
            </div>
            <div class="border border-gray-200 rounded overflow-hidden">
                <img src="<?= $image3; ?>" alt="<?= $drink3; ?>" class="w-full object-cover">
                <div class="p-4">
                    <h2 class="font-bold mb-2"><?= $drink3; ?></h2>
                    <p>
                        &yen;<?= $price3; ?> 
                        x 
                        <?= $quantity3 ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="mx-auto mt-4 border border-gray-200 p-4 rounded  text-right">
            <div class="font-bold">
                支払価格: &yen;<?= $totalWithDiscount; ?>
            </div>
            <div class="text-right">
                合計: &yen;<?= $total; ?>
            </div>
            <div class="text-right">
                割引: &yen;<?= $discount; ?>
            </div>
            <div>
                獲得ポイント: <?= $point; ?>pt (<?= POINT_RATE * 100 ?>%)
            </div>
        </div>
    </main>
</body>

</html>
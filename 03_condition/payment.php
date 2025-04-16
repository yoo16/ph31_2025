<?php
// 支払い金額
$payment = 300;
// 所持金
$charge = 1000;
// メッセージ
$message = "";
// メンテナンス中
$isMaintenance = false;

// 会員フラグ
$isMember = false;
// セール中フラグ
$isSale = false;

$memberLabel = $isMember ? "会員" : "非会員";

if ($isMaintenance) {
    $message = "メンテナンス中です。";
} else {
    if ($payment <= $charge) {
        $message = "お買い上げありがとうございます。";
    } else {
        $message = "残金が不足しています。";
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condition</title>
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="container w-1/2 mx-auto p-4">
        <h1 class="text-2xl text-center font-bold p-3">お会計</h1>
        <div class="mx-auto mt-4 border border-gray-200 p-4 rounded  text-right">
            <div class="py-5">
                <div class="text-right py-2">
                    <span class="text-sm mr-2">所持金</span>
                    <span class="font-bold  text-lg">&yen;<?= number_format($charge); ?></span>
                </div>
                <div class="text-right py-2">
                    <span class="text-sm mr-2">支払い金額</span>
                    <span class="font-bold text-lg">&yen;<?= number_format($payment); ?></span>
                </div>
            </div>
            <button class="bg-sky-500 p-3 w-full text-white rounded-lg">決済</button>
        </div>
    </main>
</body>

</html>
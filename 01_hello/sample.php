<?php
$itemName = "test";            // 変数名修正、文字列はクオートで囲む
$price = 100;                  // セミコロンが抜けていたので追加
$quantity = 5;

$totalPrice = $price * $quantity;  // 変数に $ をつけ忘れていたので修正
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>合計金額</h2> 
    <p><?php echo $totalPrice; ?></p>  <!-- echo を使って出力 -->
</body>
</html>

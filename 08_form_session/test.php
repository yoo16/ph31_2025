<?php
session_start();
// セッション(count)を取得
$count = $_SESSION['count'] ?? 0;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>セッションカウンター</h1>
    <p>現在のカウント: <?= $count ?></p>
</body>
</html>
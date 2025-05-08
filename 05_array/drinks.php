<?php
$drinks = ['コーヒー', '紅茶', 'ほうじ茶'];
// TODO: 商品選択
$selected = $drinks[1];
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
    <main class="container mx-auto p-4 w-1/2">
        <div class="flex items-center justify-center p-6 text-center">
            <label class="mr-4 text-sm bg-green-600 text-white p-3 rounded-full">本日のおすすめ</label>
            <span class="text-3xl"><?= $selected ?></span>
        </div>
    </main>
</body>

</html>
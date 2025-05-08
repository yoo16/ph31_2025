<?php
// TODO: range() で 各列のビンゴ番号の範囲作成
$ranges = [
    // TODO: 1行目 :1-15
    range(1, 15),
    // TODO: 2行目 :16-30
    range(16, 30),
    // TODO: 3行目 :31-45
    range(31, 45),
    // TODO: 4行目 :46-60
    range(46, 60),
    // TODO: 5行目 :61-75
    range(61, 75),
];

$columns = [];
// TODO: foreach で ranges を繰り返し
foreach ($ranges as $range) {
    // TODO: 配列をシャッフル: shuffle($range)
    shuffle($range);
    // var_dump($range);
    // TODO: 5つ選んで、$column[] に追加: array_slice($range, 0, 5)
    $columns[] = array_slice($range, 0, 5);
}
// TODO: 中央を(3, 3) を「FREE」の文字に置き換え
$columns[2][2] = 'FREE';

// ビンゴカードのラベル
$labels = ['B', 'I', 'N', 'G', 'O'];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ビンゴカード</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50">
    <main class="container mx-auto p-6">
        <h1 class="text-3xl text-center font-bold mb-6">🎯 ビンゴカード</h1>
        <div class="grid grid-cols-5 gap-px max-w-md mx-auto bg-gray-300 text-center text-lg font-bold shadow-md">
            <?php foreach ($labels as $label): ?>
                <div class="bg-blue-500 text-white p-4"><?= $label ?></div>
            <?php endforeach; ?>

            <?php foreach ($columns as $rows): ?>
                <?php foreach ($rows as $value): ?>
                    <div class="<?= $isFree ? 'bg-yellow-200' : 'bg-white' ?> p-4 border border-gray-300 hover:bg-green-100 transition">
                        <?= $value ?>
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>
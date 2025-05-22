<?php
// TODO: セッションの開始
session_start();

// TODO: regenerate_id()を使ってセッションIDを再生成する
session_regenerate_id(true);

// TODO: セッションID取得

// セッションクリア処理
if (isset($_GET['is_clear'])) {
    // TODO: ここでセッションをクリアする
    unset($_SESSION['count']);
}
// カウントをインクリメント
if (isset($_SESSION['count'])) {
    // TODO: ここでカウントをインクリメントする
    $_SESSION['count']++;
} else {
    // TODO: ここでカウントを初期化(0)する
    $_SESSION['count'] = 0;
}
$count = $_SESSION['count'] ?? 0;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>カウンター</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">

    <main class="bg-white shadow-lg rounded-xl p-8 w-full max-w-md text-center">
        <h1 class="text-2xl font-bold text-blue-700 mb-4">🔢 セッションカウンター</h1>

        <div class="mb-6">
            <p class="text-lg text-gray-700">現在のカウント:</p>
            <p class="text-4xl font-bold text-green-600"><?= $count ?></p>
        </div>

        <div class="flex justify-center gap-4 mb-8">
            <a href="counter.php" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow transition">
                ➕ カウント
            </a>
            <a href="counter.php?is_clear=1" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow transition">
                ♻️ クリア
            </a>
        </div>

        <h2 class="text-lg font-semibold text-gray-800 mb-2">セッションID</h2>
        <p class="text-xs text-gray-500 break-all mb-1"><?= $session_id ?? '' ?></p>
        <p class="text-xs text-gray-400">(Cookie: <?= $_COOKIE['PHPSESSID'] ?? '' ?>)</p>
    </main>

</body>

</html>
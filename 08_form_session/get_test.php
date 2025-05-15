<?php 
// TODO: GETデータの取得
$queries = $_GET;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>GETリクエスト</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">

    <main class="bg-white shadow-lg rounded-xl p-8 w-full max-w-xl">
        <h1 class="text-2xl font-bold text-blue-700 mb-4">🔍 GETリクエストフォーム</h1>

        <form action="" method="get" class="space-y-4">
            <div>
                <label for="keyword" class="block text-sm font-medium text-gray-700 mb-1">キーワード</label>
                <input type="text" name="keyword" id="keyword" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="<?= htmlspecialchars($queries['keyword'] ?? '') ?>">
            </div>
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">カテゴリ</label>
                <input type="text" name="category" id="category" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="<?= htmlspecialchars($queries['category'] ?? '') ?>">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
                検索
            </button>
        </form>

        <?php if (!empty($queries)): ?>
            <div class="mt-8 bg-gray-50 border-l-4 border-blue-400 p-4 rounded">
                <h2 class="font-semibold text-gray-700 mb-2">🔎 受信したGETデータ:</h2>
                <ul class="text-sm text-gray-800 space-y-1">
                    <?php foreach ($queries as $key => $value): ?>
                        <li><strong><?= htmlspecialchars($key) ?>:</strong> <?= htmlspecialchars($value) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </main>

</body>
</html>

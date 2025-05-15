 <?php 
$posts = [];
// POSTリクエストの場合
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO: POSTデータの取得
    $posts = $_POST;
    // var_dump($_POST['email']);
    // var_dump($_POST['password']);
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POSTリクエスト</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center font-sans">

    <main class="bg-white shadow-lg rounded-xl p-8 w-full max-w-xl">
        <h1 class="text-2xl font-bold text-blue-700 mb-4">POSTリクエスト</h1>

        <form action="" method="post" class="space-y-4">
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">メールアドレス</label>
                <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="<?= htmlspecialchars($posts['email'] ?? '') ?>">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">パスワード</label>
                <input type="password" name="password" id="password" class="w-full border border-gray-300 rounded px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                    value="<?= htmlspecialchars($posts['password'] ?? '') ?>">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">
                送信
            </button>
        </form>

        <?php if (!empty($posts)): ?>
            <div class="mt-8 bg-gray-50 border-l-4 border-blue-400 p-4 rounded">
                <h2 class="font-semibold text-gray-700 mb-2">📦 POSTデータ受信:</h2>
                <ul class="text-sm text-gray-800 space-y-1">
                    <?php foreach ($posts as $key => $value): ?>
                        <li><strong><?= htmlspecialchars($key) ?>:</strong> <?= htmlspecialchars($value) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </main>

</body>
</html>

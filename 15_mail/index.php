<?php
// TODO: セッション開始
session_start();

// TODO: send.php のセッションデータを読み込み
$name = (isset($_SESSION['name'])) ? $_SESSION['name'] : "";
$email = (isset($_SESSION['email'])) ? $_SESSION['email'] : "";
$body = (isset($_SESSION['body'])) ? $_SESSION['body'] : "";
$error = '';
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8 text-gray-800">
    <!-- ローディングオーバーレイ -->
    <div id="loadingOverlay" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="flex flex-col items-center">
            <!-- スピナー -->
            <svg class="animate-spin h-12 w-12 text-white mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8v8z"></path>
            </svg>
            <p class="text-white text-lg font-semibold">送信中...</p>
        </div>
    </div>

    <!-- Main -->
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl text-center font-bold mb-4">お問い合わせフォーム</h1>

        <?php if ($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?= $error ?>
            </div>
        <?php endif ?>
        <form action="send.php" method="POST" class="space-y-4" onsubmit="handleSubmit(event)">
            <div>
                <label class="block font-semibold mb-1">お名前</label>
                <input type="text" name="name" value="<?= $name ?>" required class="w-full border px-4 py-2 rounded">
            </div>
            <div>
                <label class="block font-semibold mb-1">メールアドレス</label>
                <input type="email" name="email" value="<?= $email ?>" required class="w-full border px-4 py-2 rounded">
            </div>
            <div>
                <label class="block font-semibold mb-1">問い合わせ内容</label>
                <textarea name="body" rows="6" required class="w-full border px-4 py-2 rounded"><?= $body ?></textarea>
            </div>
            <div class="flex justify-center">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded flex items-center justify-center gap-2">
                    <span>送信する</span>
                </button>
            </div>
        </form>
    </div>

    <script>
        function handleSubmit(event) {
            document.getElementById("loadingOverlay").classList.remove("hidden");
        }
    </script>
</body>

</html>
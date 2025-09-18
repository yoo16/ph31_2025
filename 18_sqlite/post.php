<?php
// DB接続をする
require_once __DIR__ . "/db.php";
// メッセージ用の変数
$message = "";

// アップロード用ディレクトリ確認
$uploadDir = __DIR__ . "/uploads/";
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
    chmod($uploadDir, 0777);
}

// 投稿処理
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // POSTデータ取得
    $title = trim($_POST['title'] ?? "");
    $body  = trim($_POST['body'] ?? "");
    $imagePath = null;

    // 画像ファイルのアップロード処理
    if (!empty($_FILES['image']['name'])) {
        // TODO: 画像ファイル名: $_FILES['image']['name'] , time() , basename() を利用 
        $fileName = time() . "_" . basename($_FILES['image']['name']);
        $targetFile = $uploadDir . $fileName;

        // 拡張子チェック
        $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($ext, $allowed)) {
            // TODO: ファイルをアップロードディレクトリに移動
            // if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            //     $imagePath = "uploads/" . $fileName;
            // } else {
            //     $message = "⚠️ 画像アップロードに失敗しました。";
            // }
        } else {
            $message = "⚠️ 許可されていないファイル形式です。";
        }
    }

    if ($title !== "" || $imagePath !== null) { // タイトル or 画像があれば投稿可能
        // notices テーブルにデータを挿入
        $sql = "INSERT INTO notices (title, body, image) VALUES (?, ?, ?)";
        // TODO: SQL実行: prepare() と execute() を利用
        $stmt = $pdo->prepare($sql);
        $imagePath = "test";
        $stmt->execute([$title, $body, $imagePath]);

        $message = "✅ 投稿が完了しました！";
    } else {
        $message = "⚠️ タイトルか画像のどちらかは必須です。";
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>投稿フォーム | MyPix</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans text-gray-800">
    <?php include __DIR__ . "/components/header.php"; ?>

    <main class="max-w-2xl mx-auto mt-10 px-4">
        <?php if ($message): ?>
            <div class="mb-6 p-4 rounded-lg <?= str_contains($message, "✅") ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' ?>">
                <?= htmlspecialchars($message) ?>
            </div>
        <?php endif; ?>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">新規投稿</h2>
            <form method="post" enctype="multipart/form-data" class="space-y-4">
                <div>
                    <label class="block text-sm font-medium mb-1">タイトル</label>
                    <input type="text" name="title" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-indigo-400">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">本文</label>
                    <textarea name="body" rows="4" class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-indigo-400"></textarea>
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">画像</label>
                    <input type="file" name="image" accept="image/*" class="block w-full text-sm text-gray-500">
                </div>
                <div class="text-right">
                    <button type="submit" class="px-5 py-2 bg-indigo-500 hover:bg-indigo-600 text-white font-medium rounded-lg shadow">
                        投稿する
                    </button>
                </div>
            </form>
        </div>
    </main>

    <?php include __DIR__ . "/components/footer.php"; ?>
</body>

</html>
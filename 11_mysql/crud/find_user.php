<?php
require_once '../env.php';
require_once '../lib/Database.php';

// GETパラメータからユーザIDを取得
if (!empty($_GET['id'])) {
    $user_id = $_GET['id'];
    $user = find($user_id);
}

// ユーザデータを取得する関数
function find($id)
{
    // DB接続
    $pdo = Database::getInstance();

    // 1) プリペアードステートメントで実行
    // TODO: SQL文（プレースホルダ）
    $sql = "SELECT * FROM users WHERE id = :id;";

    try {
        // TODO: SQL事前準備
        $stmt = $pdo->prepare($sql);
        // TODO: SQL実行：:id のパラメータを引数
        $stmt->execute();

        // 2) SQLインジェクションの脆弱性がある実行
        // '' OR 1=1;-- などの文字列を入力すると全ユーザが取得される
        // $sql = "SELECT * FROM users WHERE id = {$id};";
        // $stmt = $pdo->query($sql);

        // Userデータを取得
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    } catch (PDOException $e) {
        error_log($e->getMessage());
        return;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザ検索</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="mx-auto bg-white p-6">
        <h2 class="text-2xl py-2 mb-6 text-gray-700">ユーザ検索</h2>
        <form action="" method="get" class="mb-8">
            <div class="flex items-center gap-4">
                <label for="id" class="text-gray-600 whitespace-nowrap">ユーザID</label>
                <input
                    type="text"
                    name="id"
                    id="id"
                    class="w-48 px-4 py-2 border border-gray-300 rounded-md"
                    value="<?= $user_id ?? '' ?>">
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded">
                    検索
                </button>
            </div>
        </form>

        <h2 class="py-2 text-2xl">SQLインジェクション</h2>
        <div class="bg-gray-100 p-4 rounded-md">
            '' OR 1=1;--
        </div>

        <h2 class="py-2 text-2xl">結果</h2>
        <?php if (!empty($user)): ?>
            <div class="flex flex-col gap-4 text-gray-800 bg-gray-100 p-4 rounded-md">
                <div>
                    <span class="block text-sm text-gray-500">ユーザID</span>
                    <div class="text-lg"><?= $user['id'] ?></div>
                </div>
                <div>
                    <span class="block text-sm text-gray-500">アカウント名</span>
                    <div class="text-lg"><?= $user['account_name'] ?></div>
                </div>
                <div>
                    <span class="block text-sm text-gray-500">メールアドレス</span>
                    <div class="text-lg"><?= $user['email'] ?></div>
                </div>
                <div>
                    <span class="block text-sm text-gray-500">パスワード</span>
                    <div class="text-lg"><?= $user['password'] ?></div>
                </div>
                <div>
                    <span class="block text-sm text-gray-500">作成日時</span>
                    <div class="text-lg"><?= $user['created_at'] ?></div>
                </div>
                <div>
                    <span class="block text-sm text-gray-500">更新日時</span>
                    <div class="text-lg"><?= $user['updated_at'] ?></div>
                </div>
            </div>
        <?php else: ?>
            <p class="text-red-500 font-semibold">ユーザが見つかりませんでした。</p>
        <?php endif ?>
    </main>
</body>

</html>
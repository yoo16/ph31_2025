<?php
require_once '../env.php';
require_once '../lib/Database.php';

// POSTチェック
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // idを取得
    $id = $_POST['id'];
    // passwordを取得
    $password = $_POST['password'];
    $result = update($id, $password);
}

// ユーザ情報を取得する関数
function update($id, $password)
{
    try {
        // TODO: パスワードハッシュ化
        $hash = "";
        // DB接続
        $pdo = Database::getInstance();
        // TODO: SQL作成： 指定した id で検索して users.password を更新
        $sql = "";
        // SQL事前準備
        $stmt = $pdo->prepare($sql);
        // SQL実行: id, password パラメータ
        $result = $stmt->execute(['id' => $id, 'password' => $hash]);
        return $result;
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
    <title>パスワード変更</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="mx-auto bg-white p-6">
        <h2 class="text-2xl py-2 mb-6 text-gray-700">パスワード変更</h2>
        <form action="" method="post" class="mb-8">
            <div class="flex items-center gap-4">
                <label for="id" class="text-gray-600 whitespace-nowrap">ユーザID</label>
                <input
                    type="text"
                    name="id"
                    id="id"
                    class="w-48 px-4 py-2 border border-gray-300 rounded-md"
                    value="<?= $id ?? '' ?>">
                <label for="password" class="text-gray-600 whitespace-nowrap">パスワード</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="w-48 px-4 py-2 border border-gray-300 rounded-md">
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded">
                    更新
                </button>
            </div>
        </form>

        <h2 class="py-2 text-2xl">結果</h2>
        <?php if (!empty($result)): ?>
            <div class="bg-green-300 p-4">
                成功
            </div>
        <?php endif ?>
    </main>
</body>

</html>
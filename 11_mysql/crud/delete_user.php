<?php
require_once '../env.php';
require_once '../lib/Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // idがPOSTされている場合、削除処理を実行
    $result = delete($_POST['id']);
}

// POSTリクエストの場合、ユーザデータを削除
function delete($id)
{
    try {
        // DB接続
        $pdo = Database::getInstance();
        // TODO: SQL作成: 指定した id で検索してレコードを削除
        $sql = "DELETE FROM users WHERE id = :id;";
        // SQLを設定して、プリペアードステートメントを生成
        $stmt = $pdo->prepare($sql);
        // SQL実行
        $result = $stmt->execute(['id' => $id]);
    } catch (PDOException $e) {
        error_log($e->getMessage());
        $error = "ユーザの削除に失敗しました。" . $e->getMessage();
        return $error;
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザ削除</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="mx-auto bg-white  p-6">
        <h2 class="text-2xl mb-6">ユーザ削除</h2>
        <form action="" method="post" class="mb-8">
            <div class="flex items-center gap-4">
                <input
                    type="text"
                    name="id"
                    id="id"
                    class="w-48 px-4 py-2 border border-gray-300 rounded-md"
                    placeholder="id">
                <button
                    type="submit"
                    class="px-4 py-2 bg-red-500 text-white rounded">
                    削除
                </button>
            </div>
        </form>

        <h2 class="py-2 text-2xl">結果</h2>
        <?php if (isset($result)): ?>
            <div class="border-b border-gray-200 p-2">
                <?= $result ?>
            </div>
        <?php endif; ?>
    </main>
</body>

</html>
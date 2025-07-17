<?php
// 共通処理を読み込む
require_once 'app.php';

// TODO: GETリクエストから id を取得
$id = null;

// id を渡してレコードを取得
$record = find($id);

// 初期メッセージ
$message = '';
if (!$record) {
    $message = '該当する記録が見つかりません。';
}
// セッションメッセージの取得
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}

function find($id)
{
    // データベース接続
    $pdo = Database::getInstance();
    // health_recordsテーブルから該当レコードを取得
    $sql = "SELECT * FROM health_records WHERE id = :id";
    // プリペアドステートメントを作成
    $stmt = $pdo->prepare($sql);
    // SQLを実行
    $stmt->execute([':id' => $id]);
    // 結果を取得
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    return $record;
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include 'components/head.php' ?>

<body>
    <?php include 'components/nav.php' ?>

    <main class="container mx-auto w-1/2">
        <h1 class="text-2xl font-bold mb-6 text-gray-500">記録編集</h1>
        <!-- メッセージ -->
        <?php if ($message): ?>
            <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <? if ($record): ?>
            <form action="update.php" method="post">
                <div class="text-gray-500 text-sm space-y-4">
                    <!-- id を送信 -->
                    <input type="hidden" name="id" value="<?= $record['id'] ?>">

                    <div class="my-4">
                        <label class="block mb-1 text-green-600">記録日</label>
                        <input type="date" name="recorded_at" required
                            value="<?= $record['recorded_at'] ?>"
                            class="w-full border-b border-green-600 p-2">
                    </div>
                    <div class="my-4">
                        <label class="block mb-1 text-green-600">体重（kg）</label>
                        <input type="number" name="weight" step="0.1" required
                            value="<?= $record['weight'] ?>"
                            class="w-full border-b border-green-600 p-2">
                    </div>
                    <div class="my-4">
                        <label class="block mb-1 text-green-600">心拍数（bpm）</label>
                        <input type="number" name="heart_rate" required
                            value="<?= $record['heart_rate'] ?>"
                            class="w-full border-b border-green-600 p-2">
                    </div>
                    <div class="my-4">
                        <label class="block mb-1 text-green-600">血圧（上）</label>
                        <input type="number" name="systolic" required
                            class="w-full border-b border-green-600 p-2"
                            value="<?= $record['systolic'] ?>">
                    </div>
                    <div>
                        <label class="block mb-1 text-green-600">血圧（下）</label>
                        <input type="number" name="diastolic" required
                            class="w-full border-b border-green-600 p-2"
                            value="<?= $record['diastolic'] ?>">
                    </div>
                </div>
                <div class="flex justify-between mt-6 text-sm">
                    <button type="submit" class="mr-1 w-full bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        更新
                    </button>
                    <a href="history.php" class="w-full text-center block text-green-600 px-4 py-2 border border-green-600 rounded">キャンセル</a>
                </div>
            </form>

            <form action="delete.php" method="post" onsubmit="return confirm('この記録を削除してもよろしいですか？');" class="mt-6 text-right">
                <input type="hidden" name="id" value="<?= $record['id'] ?>">
                <button type="submit" class="w-1/2 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                    削除
                </button>
            </form>
        <? endif ?>
    </main>

    <?php include 'components/footer.php'; ?>
</body>

</html>
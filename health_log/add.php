<?php
// 共通処理を読み込む
require_once 'app.php';

// 初期値
$record = [
    'weight' => 50,
    'heart_rate' => 80,
    'systolic' => 120,
    'diastolic' => 80,
    'recorded_at' => date('Y-m-d'),
];

// 初期メッセージ
$message = '';

// セッションから値を取得
if (isset($_SESSION['form'])) {
    $record = $_SESSION['form'];
    unset($_SESSION['form']);
}

// エラーメッセージの取得
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include 'components/head.php' ?>

<body>
    <?php include 'components/nav.php' ?>

    <main class="container mx-auto w-1/2">
        <h1 class="text-2xl font-bold mb-6 text-gray-500">新規記録</h1>
        <!-- メッセージ -->
        <?php if ($message): ?>
            <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded">
                <?= $message ?>
            </div>
        <?php endif; ?>

        <form action="insert.php" method="post" class="space-y-4">
            <div class="text-gray-500 text-sm space-y-4">
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


                <div class="flex justify-between mt-6">
                    <button type="submit" class="mr-1 w-full bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                        登録
                    </button>
                    <a href="history.php" class="w-full text-center block text-green-600 px-4 py-2 border border-green-600 rounded">キャンセル</a>

                </div>
            </div>
        </form>
    </main>

    <?php include 'components/footer.php'; ?>
</body>

</html>
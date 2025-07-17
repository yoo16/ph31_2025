<?php
require_once 'app.php';

// 一覧データを取得
$records = get();

function get($limit = 30)
{
    // データベース接続
    $pdo = Database::getInstance();
    // SQLクエリ
    $sql = "SELECT * FROM health_records ORDER BY recorded_at DESC LIMIT :limit";

    // プリペアドステートメントを作成
    $stmt = $pdo->prepare($sql);
    // SQLを実行
    $stmt->execute([':limit' => $limit]);
    // 結果を取得
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $records;
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include 'components/head.php' ?>

<body>
    <?php include 'components/nav.php' ?>

    <main class="container mx-auto w-full">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-green-600">健康履歴</h1>
            <div class="flex space-x-4">
                <!-- 新規記録 -->
                <a href="add.php" class="bg-green-600 text-xs text-white px-4 py-2 rounded">
                    新規記録
                </a>
                <!-- ダウンロード -->
                <a href="api/health/csv/" class="bg-green-600 text-xs text-white px-4 py-2 rounded">
                    CSVダウンロード
                </a>
            </div>
        </div>

        <!-- ここに診断結果を表示 -->
        <div id="ai-result" class="my-3 p-6 bg-green-50 text-gray-800 text-base text-sm leading-relaxed space-y-4 rounded-lg shadow">
            <!-- ここに marked.js で生成した HTML を差し込み -->
        </div>

        <table class="w-full table-auto border-collapse text-xs">
            <thead class="text-left text-green-700">
                <tr class="border-b border-gray-100">
                    <th class="p-2 font-normal"></th>
                    <th class="p-2 font-normal">日付</th>
                    <th class="p-2 font-normal">体重(kg)</th>
                    <th class="p-2 font-normal">心拍数(bpm)</th>
                    <th class="p-2 font-normal">血圧（上）(mmHg)</th>
                    <th class="p-2 font-normal">血圧（下）(mmHg)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($records as $row): ?>
                    <tr class="border-b border-gray-100 text-gray-700">
                        <td class="p-2">
                            <a href="edit.php?id=<?= $row['id'] ?>" class="border border-green-500 rounded px-2 py-1 text-green-500 text-xs">Edit</a>
                        </td>
                        <td class="p-2" nowrap="nowrap"><?= "" ?></td>
                        <td class="p-2"><?= "" ?></td>
                        <td class="p-2"><?= "" ?></td>
                        <td class="p-2"><?= "" ?></td>
                        <td class="p-2"><?= "" ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

    <?php include 'components/footer.php'; ?>
</body>

</html>
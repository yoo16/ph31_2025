<!DOCTYPE html>
<html lang="ja">

<?php include VIEW_DIR . 'components/head.php' ?>

<body class="bg-gray-50">
    <?php include VIEW_DIR . 'components/admin/nav.php' ?>

    <main class="mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold text-center mb-6">訪問一覧</h1>

        <?php if (count($visits) === 0): ?>
            <p class="text-gray-500">訪問履歴はありません。</p>
        <?php else: ?>
            <table class="w-full bg-white shadow rounded border-collapse">
                <thead>
                    <tr class="bg-gray-100 text-left">
                        <th class="p-3 border-b">席番号</th>
                        <th class="p-3 border-b">ステータス</th>
                        <th class="p-3 border-b">合計（税込）</th>
                        <th class="p-3 border-b">更新日</th>
                        <th class="p-3 border-b">詳細</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($visits as $visit): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="p-3 border-b"><?= htmlspecialchars($visit['seat_id']) ?></td>
                            <td class="p-3 border-b"><?= htmlspecialchars($visit['status_label']) ?></td>
                            <td class="p-3 border-b text-right"><?= number_format($visit['total_with_tax'] ?? 0) ?>円</td>
                            <td class="p-3 border-b text-sm"><?= htmlspecialchars($visit['updated_at']) ?></td>
                            <td class="p-3 border-b">
                                <a href="admin/visit/show.php?id=<?= $visit['id'] ?>" class="text-blue-600 hover:underline">詳細</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>

</body>

</html>
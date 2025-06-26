<!DOCTYPE html>
<html lang="ja">

<?php include VIEW_DIR . 'components/head.php' ?>

<body class="bg-gray-50">
    <?php include VIEW_DIR . 'components/admin/nav.php' ?>

    <main class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl text-center font-bold mb-4">カテゴリ一覧</h1>

        <div class="mb-4 text-right">
            <a href="admin/category/create.php" class="bg-sky-600 text-white px-4 py-2 rounded hover:bg-sky-700">
                カテゴリ追加
            </a>
        </div>

        <?php if ($categories): ?>
            <table class="min-w-full text-left table-auto border border-gray-200">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border px-4 py-2">操作</th>
                        <th class="border px-4 py-2">カテゴリ名</th>
                        <th class="border px-4 py-2">並び順</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category): ?>
                        <tr class="border-b hover:bg-gray-50">
                            <td class="border px-4 py-2">
                                <a href="admin/category/edit.php?id=<?= $category['id'] ?>" class="text-blue-600">編集</a>
                            </td>
                            <td class="border px-4 py-2"><?= $category['name'] ?></td>
                            <td class="border px-4 py-2"><?= $category['sort_order'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </main>
</body>

</html>
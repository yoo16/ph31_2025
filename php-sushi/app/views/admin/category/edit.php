<!DOCTYPE html>
<html lang="ja">

<?php include VIEW_DIR . 'components/head.php' ?>

<body class="bg-gray-50">
    <?php include VIEW_DIR . 'components/admin/nav.php' ?>

    <main class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl text-center font-bold mb-4">カテゴリ-編集</h1>

        <form action="admin/category/update.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <input type="hidden" name="id" value="<?= $category['id'] ?? '' ?>">
            <div>
                <label for="name" class="block text-sm font-semibold">カテゴリ名</label>
                <input type="text" name="name" id="name"
                    value="<?= $category['name'] ?? '' ?>"
                    required
                    class="w-full border px-3 py-2 rounded" />
            </div>

            <div>
                <label for="sort_order" class="block text-sm font-semibold">並び順</label>
                <input type="number" name="sort_order" id="sort_order" min="0"
                    value="<?= $category['sort_order'] ?? '' ?>"
                    class="w-full border px-3 py-2 rounded" />
            </div>

            <div class="flex justify-between items-center mt-4">
                <button type="submit"
                    class="bg-sky-600 text-white px-4 py-2 rounded hover:bg-sky-700">
                    更新
                </button>
                <a href="admin/category/" class="inline border border-sky-600 text-sky-600 px-4 py-2 rounded">戻る</a>
            </div>
        </form>
        <form action="admin/category/delete.php" method="POST" class="mt-4">
            <input type="hidden" name="id" value="<?= $category['id'] ?? '' ?>">
            <button type="submit"
                onclick="return confirm('本当に削除しますか？');"
                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                削除
            </button>
        </form>
    </main>
</body>

</html>
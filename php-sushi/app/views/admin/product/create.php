<!DOCTYPE html>
<html lang="ja">

<?php include VIEW_DIR . 'components/head.php' ?>

<body class="bg-gray-50">
    <?php include VIEW_DIR . 'components/admin/nav.php' ?>

    <main class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-4">商品登録</h1>

        <form action="admin/product/add.php" method="POST" enctype="multipart/form-data" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-semibold">商品名</label>
                <input type="text" name="name" id="name" required
                    class="w-full border px-3 py-2 rounded" />
            </div>

            <div>
                <label for="category_id" class="block text-sm font-semibold">カテゴリ</label>
                <select name="category_id" id="category_id" required
                    class="w-full border px-3 py-2 rounded">
                    <option value="">選択してください</option>
                    <?php foreach ($categories as $cat): ?>
                        <option value="<?= htmlspecialchars($cat['id']) ?>">
                            <?= htmlspecialchars($cat['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="price" class="block text-sm font-semibold">価格（円）</label>
                <input type="number" name="price" id="price" min="0" required
                    class="w-full border px-3 py-2 rounded" />
            </div>

            <div>
                <label for="image" class="block text-sm font-semibold">画像ファイル</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full border px-3 py-2 rounded" />
            </div>

            <div class="flex justify-between items-center mt-4">
                <button type="submit"
                    class="bg-sky-600 text-white px-4 py-2 rounded hover:bg-sky-700">
                    登録
                </button>
                <a href="admin/product/" class="inline border border-sky-600 text-sky-600 px-4 py-2 rounded">戻る</a>
            </div>
        </form>
    </main>
</body>

</html>
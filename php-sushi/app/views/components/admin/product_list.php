<?php if ($products): ?>
    <table class="min-w-full text-left table-auto border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">操作</th>
                <th class="border px-4 py-2">商品名</th>
                <th class="border px-4 py-2">価格</th>
                <th class="border px-4 py-2">カテゴリ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr class="hover:bg-gray-50">
                    <td class="border px-4 py-2 space-x-2">
                        <!-- TODO: products.id GETパラメーターとする -->
                        <a href="admin/product/edit.php?id=<?= $product['id'] ?>" class="text-blue-600 hover:underline">編集</a>
                    </td>
                    <td class="border px-4 py-2">
                        <!-- TODO: products.image_path -->
                        <img src="<?= $product['image_path'] ?>" alt="" class="w-12">
                        <!-- TODO: products.name -->
                        <?= $product['name'] ?>
                    </td>
                    <td class="border px-4 py-2">
                        <!-- TODO: products.price -->
                        <?= $product['price'] ?>円
                    </td>
                    <td class="border px-4 py-2">
                        <!-- TODO: $category_names を利用してカテゴリ名表示 -->
                        <?= $category_names[$product['category_id']] ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
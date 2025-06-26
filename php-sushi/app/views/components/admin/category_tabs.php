<div class="mb-4 flex gap-2">
    <!-- 「すべて」リンク -->
    <a href="admin/product/"
        class="px-3 py-1 rounded 
                <?= (!$category_id) ? 'bg-sky-600 text-white' : '' ?>">
        すべて
    </a>

    <!-- カテゴリごとのリンク -->
    <?php foreach ($category_names as $id => $name): ?>
        <a href="admin/product/category.php?category_id=<?= $id ?>"
            class="px-3 py-1 rounded 
                    <?= $category_id == $id ? 'bg-sky-600 text-white' : '' ?>">
            <!-- TODO: name -->
            xxxx
        </a>
    <?php endforeach; ?>
</div>
<!DOCTYPE html>
<html lang="ja">

<?php include VIEW_DIR . 'components/head.php' ?>

<body class="bg-gray-50">
    <?php include VIEW_DIR . 'components/admin/nav.php' ?>

    <main class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl text-center font-bold mb-4">商品一覧</h1>

        <?php include VIEW_DIR . 'components/admin/search_product.php'; ?>

        <?php include VIEW_DIR . 'components/admin/category_tabs.php'; ?>

        <?php include VIEW_DIR . 'components/admin/product_list.php'; ?>
    </main>
</body>

</html>
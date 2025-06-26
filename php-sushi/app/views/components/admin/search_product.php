<div class="mb-4 flex justify-between items-center">
    <a href="admin/product/create.php" class="bg-sky-600 text-white px-4 py-2 rounded hover:bg-sky-700">
        商品追加
    </a>
    <form method="get" action="admin/product/search.php" class="inline-block">
        <input type="text" name="keyword" placeholder="商品名で検索"
            class="border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-sky-500">
        <button type="submit" class="bg-sky-600 text-white px-4 py-2 rounded hover:bg-sky-700">
            検索
        </button>
    </form>
</div>
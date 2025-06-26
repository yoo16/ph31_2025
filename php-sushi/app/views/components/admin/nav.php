<nav class="bg-sky-600 text-white px-6 py-3 mb-6 relative">
    <ul class="flex space-x-6">
        <li><a href="admin/">ホーム</a></li>
        <li><a href="admin/visit/">訪問</a></li>
        <li><a href="admin/product/">商品</a></li>
        <li><a href="admin/category/">カテゴリー</a></li>
        <li class="relative">
            <button id="api-toggle">API</button>

            <!-- サブメニュー -->
            <ul id="api-submenu" class="absolute mt-2 bg-white text-black shadow-lg rounded hidden z-10">
                <li><a href="api/category/fetch.php" target="_blank" class="block px-4 py-2 hover:bg-sky-100">category/fetch.php</a></li>
                <li><a href="api/product/fetch.php" target="_blank" class="block px-4 py-2 hover:bg-sky-100">product/fetch.php</a></li>
                <li><a href="api/order/fetch.php" target="_blank" class="block px-4 py-2 hover:bg-sky-100">order/fetch.php</a></li>
                <li><a href="api/order/billed.php" target="_blank" class="block px-4 py-2 hover:bg-sky-100">order/billed.php</a></li>
                <li><a href="api/category/csv.php" class="block px-4 py-2 hover:bg-sky-100">CSV（カテゴリ）</a></li>
                <li><a href="api/product/csv.php" class="block px-4 py-2 hover:bg-sky-100">CSV（商品）</a></li>
            </ul>
        </li>
    </ul>
</nav>

<script>
    const toggleButton = document.getElementById("api-toggle");
    const submenu = document.getElementById("api-submenu");

    toggleButton.addEventListener("click", () => {
        submenu.classList.toggle("hidden");
    });

    // メニュー外をクリックで非表示
    document.addEventListener("click", (e) => {
        if (!toggleButton.contains(e.target) && !submenu.contains(e.target)) {
            submenu.classList.add("hidden");
        }
    });
</script>
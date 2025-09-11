<?php
require_once __DIR__ . "/db.php";

// notices テーブルから最新 20 件を取得, 並び順は created_at の降順
$sql = "";
// SQL実行
$stmt = $pdo->query($sql);
// SQL実行結果を配列で取得
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>MyPix - 画像投稿サイト</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="js/modal.js"></script>
</head>

<body class="bg-gray-100 font-sans text-gray-800">
    <?php include __DIR__ . "/components/header.php"; ?>

    <!-- メイン -->
    <main class="max-w-5xl mx-auto mt-10 px-4">
        <?php if (count($posts) === 0): ?>
            <div class="p-6 bg-white shadow rounded-lg text-center text-gray-500">
                まだ投稿はありません。最初の写真をアップロードしてみましょう！
            </div>
        <?php endif; ?>

        <!-- グリッド表示 -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            <?php foreach ($posts as $post): ?>
                <div class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden cursor-pointer"
                    onclick="openModal('<?= htmlspecialchars($post['image']) ?>', '<?= htmlspecialchars($post['title']) ?>', `<?= nl2br(htmlspecialchars($post['body'])) ?>`)">
                    <?php if (!empty($post['image'])): ?>
                        <!-- TODO: 投稿画像表示 -->
                        <img src=""
                            alt="投稿画像"
                            class="w-full h-48 object-cover">
                    <?php else: ?>
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-400">
                            No Image
                        </div>
                    <?php endif; ?>

                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800 text-lg mb-1">
                            <!-- TODO: title 表示 -->
                        </h3>
                        <p class="text-sm text-gray-500 mb-2">
                            <!-- TODO: created_at表示 -->
                        </p>
                        <?php if (!empty($post['body'])): ?>
                            <p class="text-gray-600 text-sm truncate">
                                <!-- TODO: 本文表示(brタグ付き) -->
                            </p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>

    <!-- モーダル -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-70 hidden items-center justify-center z-50">
        <div class="relative max-w-4xl w-full mx-4 bg-black rounded-lg p-4">
            <button onclick="closeModal()" class="absolute top-2 right-2 bg-white rounded-full p-2 shadow">
                ✕
            </button>
            <img id="modalImage" src="" alt="拡大画像" class="w-full max-h-[70vh] object-contain rounded-lg">
            <h3 id="modalTitle" class="text-center text-white mt-3 text-xl font-bold"></h3>
            <p id="modalBody" class="text-center text-gray-300 mt-2"></p>
        </div>
    </div>

    <!-- フッター -->
    <?php include __DIR__ . "/components/footer.php"; ?>
</body>

</html>
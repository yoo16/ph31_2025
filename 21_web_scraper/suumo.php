<?php
// 表示対象のエリアを判定（リダイレクト直後ならそのエリア、それ以外はデフォルト）
$lastArea = $_GET['area'] ?? 'sc_shinjuku';
$targetFile = "data/properties_{$lastArea}.json";
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>SUUMOスクレイパー</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/default.css">
</head>

<body class="bg-slate-50 p-10">
    <div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-slate-800">物件取得ツール</h1>

        <form id="scrape-form" action="suumo_scrape.php" method="POST" class="space-y-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">対象の区を選択</label>
                <select name="area" class="w-full border-2 border-gray-200 p-2 rounded-lg focus:border-blue-500 outline-none">
                    <option value="sc_shinjuku">新宿区</option>
                    <option value="sc_shibuya">渋谷区</option>
                    <option value="sc_minato">港区</option>
                    <option value="sc_chuo">中央区</option>
                    <option value="sc_setagaya">世田谷区</option>
                </select>
            </div>

            <button type="submit" id="submit-btn" class="w-full bg-blue-600 text-white font-bold py-2 rounded-lg hover:bg-blue-700 transition">
                スクレイピング開始
            </button>
        </form>

        <!-- 取得完了したファイルがある場合、ダウンロードリンクを表示 -->
        <?php if (file_exists($targetFile)): ?>
            <div class="mt-6 p-4 bg-green-50 rounded-lg border border-green-200 text-center">
                <p class="text-sm text-green-700 mb-3">
                    <?= htmlspecialchars($lastArea) ?> の取得完了（<?= date("H:i", filemtime($targetFile)); ?>）
                </p>
                <a href="<?= $targetFile ?>" download="suumo_<?= $lastArea ?>.json"
                    class="inline-block bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition text-sm font-bold">
                    結果をダウンロード
                </a>
            </div>
        <?php endif; ?>
    </div>

    <div id="loading-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex items-center justify-center z-50">
        <div class="bg-white p-8 rounded-lg shadow-xl flex flex-col items-center">
            <div class="loader mb-4"></div>
            <p class="text-slate-700 font-bold">最新データを取得中...</p>
            <p class="text-xs text-slate-500 mt-2">※数十秒かかる場合があります</p>
        </div>
    </div>

    <script>
        const form = document.getElementById('scrape-form');
        const btn = document.getElementById('submit-btn');
        const modal = document.getElementById('loading-modal');

        form.addEventListener('submit', () => {
            // 1. 二重クリック防止（ボタン無効化）
            btn.disabled = true;
            btn.classList.replace('bg-blue-600', 'bg-gray-400');

            // 2. モーダルを表示
            modal.classList.remove('hidden');
        });
    </script>
</body>

</html>
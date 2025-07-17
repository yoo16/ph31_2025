<?php
// GETパラメータからURLを取得
$url = $_GET['url'] ?? '';
// URLが空でない場合、ファイル名を生成
$filename = 'qr_' . md5($url) . '.png';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>QRコード生成</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800 py-10">
    <div class="max-w-xl mx-auto bg-white shadow p-8 rounded-lg">
        <h1 class="text-center text-2xl font-bold mb-6">QRコード生成ツール</h1>

        <form action="" method="GET" class="mb-6">
            <label class="block mb-2 font-semibold">URLを入力してください</label>
            <input type="text" name="url" value="<?= htmlspecialchars($url) ?>"
                class="w-full border border-gray-300 rounded px-4 py-2 mb-4" placeholder="https://example.com" required>
            <div class="text-center">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    QRコードを生成
                </button>
                <a href="?"
                    class="bg-white-600 text-blue-700 font-bold py-2 px-4 rounded">
                    クリア
                </a>
            </div>
        </form>

        <?php if ($url): ?>
            <div class="mt-6 text-center">
                <img id="qrImage" src="qrcode.php?url=<?= urlencode($url) ?>" alt="QRコード" class="mx-auto border mb-4" />
                <button id="downloadBtn"
                    class="inline-block bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                    QRコードを保存
                </button>
            </div>
        <?php endif; ?>
    </div>

    <script>
        document.getElementById("downloadBtn").addEventListener("click", function() {
            const img = document.getElementById("qrImage");
            fetch(img.src)
                .then(res => res.blob())
                .then(blob => {
                    const url = window.URL.createObjectURL(blob);
                    const a = document.createElement("a");
                    a.href = url;
                    a.download = "<?= $filename ?>";
                    a.click();
                    window.URL.revokeObjectURL(url);
                });
        });
    </script>
</body>

</html>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['image'])) {
    // TODO: アップロード画像ファイルパス取得: キー image
    $file = $_FILES['image']['tmp_name'];
    // TODO: pixelの粗さ取得: キー pixel
    // デフォルト: 20
    $pixelSize = intval($_POST['pixel']) ?? 20;
    
    // TODO: 出力方法取得: キー mode
    // デフォルト: show
    $mode = 'show';

    if (!file_exists($file)) {
        die('ファイルが見つかりません。');
    }

    // 画像ファイル読み込み
    $upload_file = file_get_contents($file);

    // GDライブラリが利用可能か確認
    // 文字列から画像リソースを作成: imagecreatefromstring(): 対象ファイル: $upload_file
    $src = imagecreatefromstring($upload_file);

    // TODO: $src から画像幅取得: imagesx()
    $width = imagesx($src);
    // TODO: $src から画像高さ取得: imagesy()
    $height = imagesy($src);

    var_dump($width, $height);
    exit;

    // ピクセル化の粗さを設定
    $smallW = intval($width / $pixelSize);
    $smallH = intval($height / $pixelSize);

    // 小さな画像を作成
    $small = imagecreatetruecolor($smallW, $smallH);
    // 元画像を小さな画像にリサイズ（解像度を下げる）
    // imagecopyresampled($small, $src, 0, 0, 0, 0, $smallW, $smallH, $width, $height);

    // 小さな画像を元のサイズに拡大（画像を粗くなる）
    $pixelated = imagecreatetruecolor($width, $height);
    // imagecopyresized($pixelated, $small, 0, 0, 0, 0, $width, $height, $smallW, $smallH);

    // TODO: png形式で出力: header("Content-Type: image/png");
    header("Content-Type: image/png");
    if ($mode === 'download') {
        // TODO: ダウンロード用のヘッダーを設定
        // header("Content-Disposition: attachment; filename=\"pixelated.png\"");
    }

    // TODO: PNG形式で画像を出力: imagepng(): 対象画像リソース: $pixelated
    imagegd($pixelated);

    // メモリを解放
    // imagedestroy($src);
    // imagedestroy($small);
    // imagedestroy($pixelated);
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ピクセルアート画像ジェネレーター</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex items-center justify-center p-4">
    <div class="bg-white shadow-lg rounded-xl p-8 max-w-md w-full">
        <h2 class="text-2xl font-bold mb-6 text-center">🟪 ピクセル風画像ジェネレーター</h2>
        <form method="post" enctype="multipart/form-data" class="space-y-6">
            <div>
                <label class="block mb-1 font-medium">画像を選択:</label>
                <input type="file" name="image" accept="image/*" required
                    class="w-full p-2 border rounded border-gray-300">
            </div>
            <div>
                <label class="block mb-1 font-medium">ピクセルの粗さ (推奨:10〜50):</label>
                <div class="flex items-center gap-3">
                    <input type="range" id="pixelRange" name="pixel" value="20" min="2" max="100"
                        class="flex-1 accent-indigo-600">
                    <span id="pixelValue" class="font-semibold text-indigo-700">20</span> px
                </div>
            </div>
            <div>
                <label class="block mb-1 font-medium">出力方法:</label>
                <select name="mode"
                    class="w-full p-2 border rounded border-gray-300 bg-white">
                    <option value="show">表示</option>
                    <option value="download">ダウンロード</option>
                </select>
            </div>
            <div class="text-center">
                <button type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded w-full">
                    ピクセル化する
                </button>
            </div>
        </form>
    </div>

    <script>
        const range = document.getElementById('pixelRange');
        const valueDisplay = document.getElementById('pixelValue');
        range.addEventListener('input', () => {
            valueDisplay.textContent = range.value;
        });
    </script>
</body>

</html>
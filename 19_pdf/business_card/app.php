<?php
// Composerのautoloadを読み込む
require_once __DIR__ . '/../vendor/autoload.php';
// PdfGeneratorクラスの読み込み
require_once __DIR__ . '/PdfGenerator.php';
// 設定ファイルの読み込み
require_once __DIR__ . '/config.php';

// PdfGeneratorクラスの使用を宣言
use App\PdfGenerator;

// POSTリクエストの処理
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // PdfGeneratorクラスのインスタンスを生成
    $gen = new PdfGenerator($config);
    // PDFを生成
    $gen->generate($_POST);
    exit;
}

$name = "";
$title = "";
$email = "";
$web = "";
$tel = "";
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>名刺ジェネレーター</title>
    <link rel="stylesheet" href="css/editor.css?<?= time() ?>">
    <link rel="stylesheet" href="css/pdf.css?<?= time() ?>">
</head>

<body>

    <aside class="editor-sidebar">
        <form method="POST" class="editor-form" enctype="multipart/form-data">
            <div class="editor-row">
                <div class="input-group main-input">
                    <label>氏名</label>
                    <input type="text" name="name" id="in_name" value="東京 太郎" oninput="update()">
                </div>
                <div class="input-group color-input">
                    <label>&nbsp;</label>
                    <input type="color" name="color_name" id="in_color_name" value="#2d3436" oninput="update()">
                </div>
            </div>
            <div class="editor-row">
                <div class="input-group main-input">
                    <label>役職</label>
                    <input type="text" name="title" id="in_title" value="SENIOR ENGINEER" oninput="update()">
                </div>
                <div class="input-group color-input">
                    <label>&nbsp;</label>
                    <input type="color" name="color_title" id="in_color_title" value="#2d3436" oninput="update()">
                </div>
            </div>
            <div class="editor-row">
                <div class="input-group main-input">
                    <label>情報</label>
                </div>
                <div class="input-group color-input">
                    <input type="color" name="color_info" id="in_color_info" value="#2d3436" oninput="update()">
                </div>
            </div>
            <div class="input-group">
                <label>Email</label>
                <input type="email" name="email" id="in_email" value="tokyo@example.com" oninput="update()">
            </div>
            <div class="input-group">
                <label>Web</label>
                <input type="text" name="web" id="in_web" value="https://tokyo.com" oninput="update()">
            </div>
            <div class="input-group">
                <label>Tel</label>
                <input type="text" name="tel" id="in_tel" value="090-0000-0000" oninput="update()">
            </div>
            <div class="input-group">
                <label>背景画像</label>
                <input type="file" name="bg_image" id="in_bg" accept="image/*" onchange="previewImage(this)">
            </div>
            <input type="hidden" name="bg_base64" id="bg_base64">

            <div class="bg-manager">
                <div class="slider-row">
                    <label>ズーム</label>
                    <input type="range" name="bg_zoom" id="in_bg_zoom" min="10" max="300" value="100" oninput="update()">
                </div>
                <div class="slider-row">
                    <label>位置 X</label>
                    <input type="range" name="bg_x" id="in_bg_x" min="0" max="200" value="50" oninput="update()">
                </div>
                <div class="slider-row">
                    <label>位置 Y</label>
                    <input type="range" name="bg_y" id="in_bg_y" min="0" max="200" value="50" oninput="update()">
                </div>
            </div>

            <button type="submit" class="btn-download">PDFをダウンロード</button>
        </form>
    </aside>

    <main class="preview-main">
        <div class="preview-canvas">
            <!-- プレビュー -->
            <?php
            include 'templates/card.php';
            ?>
        </div>
    </main>

    <script src="js/app.js"></script>
</body>

</html>
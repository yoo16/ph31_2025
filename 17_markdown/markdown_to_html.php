<?php
// vendor/autoload.phpを読み込む
require 'vendor/autoload.php';

// Markdownファイルのパス
$file = './data/blog.md';
$markdown = '';
$html = '';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['markdown'])) {
    // マークダウンを取得
    $markdown = $_POST['markdown'];
    // ファイルを保存
    file_put_contents($file, $markdown); 
    $message = '保存しました。';
} elseif (file_exists($file)) {
    // ファイルがあれば読み込む
    $markdown = file_get_contents($file);
}

// TODO: ParseDownのインスタンスを作成
$parsedown = new Parsedown();
// HTMLに変換: $text()メソッドを使用
$html = $parsedown->text($markdown);
// $markdown をエスケープされたMarkdownをHTMLに変換: htmlspecialchars()を使用
$escapedMarkdown = htmlspecialchars($markdown, ENT_QUOTES | ENT_HTML5);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>Markdown Editor</title>
    <link rel="stylesheet" href="css/default.css">
    <style>
        body {
            font-family: sans-serif;
        }
        .container {
            max-width: 1000px;
            margin: 2em auto;
            display: flex;
            gap: 2em;
        }
        .column {
            flex: 1;
        }
        textarea {
            width: 100%;
            height: 400px;
            padding: 1em;
            font-family: monospace;
        }
        .prose {
            background: #f9f9f9;
            padding: 1em;
            border: 1px solid #ccc;
        }
        .message {
            color: green;
        }
        .btn {
            background: #309bff;
            color: white;
            padding: 0.5em 1em;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <main class="container">
        <div class="column">
            <h2>Markdown</h2>
            <?php if ($message): ?>
                <p class="message"><?= $message ?></p>
            <?php endif; ?>
            <form method="POST">
                <textarea name="markdown"><?= $escapedMarkdown ?></textarea>
                <br>
                <button class="btn" type="submit">保存</button>
            </form>
        </div>

        <div class="column">
            <h2>HTML表示</h2>
            <div class="prose">
                <?= $html ?>
            </div>
        </div>
    </main>
</body>
</html>
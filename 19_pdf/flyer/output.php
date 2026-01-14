<?php
// Composerのautoloadを読み込む
require_once __DIR__ . '/../vendor/autoload.php';
// 1. 設定ファイルの読み込み
require_once __DIR__ . '/config.php';

// TODO: PDFライブラリの読み込み

// 2. データの準備
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit;
}

// POSTデータの準備
$data = $_POST;

// 画像アップロードの処理
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $tmp_name = $_FILES['image']['tmp_name'];
    $data['image'] = $tmp_name;
}

// TODO: PDF出力
// new Mpdf() で mPDFの初期化 
// $config['mpdf'] の設定
$mpdf = [];

// CSS読み込み: CSSパス = $config['css']
$css = file_get_contents($config['css']);
// TODO: CSSをHTMLに書き込む: WriteHTML($css, 1)

// テンプレート読み込み: HTMLパス = $config['template']
$html = render($config['template'], $data);
// TODO: 読み込んだ $html をPDFに変換

// モード: download: D , inline: I
$outputMode = ($data['mode'] === 'download') ? 'D' : 'I';

// TODO: PDF出力

// レンダリング関数
function render($path, $vars)
{
    extract($vars);
    ob_start();
    include $path;
    return ob_get_clean();
}

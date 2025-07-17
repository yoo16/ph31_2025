<?php
require '../vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Encoding\Encoding;

// QRコードのサイズ
$size = 300;
// QRコードのマージン
$margin = 10;

// URLを取得
$text = $_GET['url'] ?? '';
if (!$text) {
    http_response_code(400);
    echo 'URLが指定されていません。';
    exit;
}

// TODO: QRコード生成

// TODO: PNGとして出力

// TODO: 画像出力
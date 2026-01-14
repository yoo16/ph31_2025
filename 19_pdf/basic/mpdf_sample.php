<?php
require '../vendor/autoload.php';

use Mpdf\Mpdf;

// 初期化（日本語モード・A4サイズ）
$config = [
    'mode' => 'ja-JP',
    'format' => 'A4'
];

// TODO:インスタンス化: 
// $mpdf = new Mpdf($config);

// HTMLを書き込み
$html = '
    <h1 style="color: #4f46e5;">こんにちは、mPDF！</h1>
    <p>これは最小構成のサンプルです。</p>
';
// TODO: HTMLを書き込み: WriteHTML()
// $mpdf->WriteHTML($html);

// TODO:ブラウザに表示: Output() (I: Inline, D: Download)
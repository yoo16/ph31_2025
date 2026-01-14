<?php

use \Mpdf\Config\ConfigVariables;
use \Mpdf\Config\FontVariables;

$defaultConfig = (new ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];
$defaultFontConfig = (new FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$config = [
    'template' => __DIR__ . '/templates/default.php',
    'css' => __DIR__ . '/css/pdf.css',
    'default_filename' => 'flyer.pdf',
    'mpdf' => [
        'mode'   => 'ja-JP',
        'format' => 'A4',
        'margin_left' => 10,
        'margin_right' => 10,
        'margin_top' => 10,
        'margin_bottom' => 10,
        'fontDir' => array_merge($fontDirs, [
            __DIR__ . '/../fonts', // ここにフォントファイル(.ttf)を置く
        ]),
        'fontdata' => $fontData + [
            'noto_sans_jp' => [
                'R' => 'NotoSansJP-Regular.ttf', // 通常体のファイル名
                'B' => 'NotoSansJP-Bold.ttf', // 太字ファイルがあれば指定
                'I' => 'NotoSansJP-Regular.ttf', // 斜体ファイルがあれば指定
            ],
        ],
        'default_font' => 'noto_sans_jp',
    ],
];

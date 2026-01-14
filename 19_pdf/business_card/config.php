<?php
ini_set('pcre.backtrack_limit', '5000000');
ini_set('pcre.recursion_limit', '5000000');
ini_set('memory_limit', '512M');

use \Mpdf\Config\ConfigVariables;
use \Mpdf\Config\FontVariables;

$defaultConfig = (new ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$config = [
    'layout'   => __DIR__ . '/templates/layout.php',
    'template' => __DIR__ . '/templates/card.php',
    'css'      => __DIR__ . '/css/pdf.css',
    'mpdf' => [
        'mode'          => 'ja-JP',
        'format'        => [91, 55], // 名刺サイズ
        'margin_left'   => 0,
        'margin_right'  => 0,
        'margin_top'    => 0,
        'margin_bottom' => 0,
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
    ],
    'default_filename' => 'business_card.pdf'
];

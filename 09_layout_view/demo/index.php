<?php
// 共通の処理ファイルを読み込む: app.php
require_once '../app.php';

// TODO: データの準備: 連想配列で title と message を用意
$data = [];

// View でレンダリング: app/views/demo/index.view.php
// データ($data)を Viewに渡す
View::render('demo/index', $data);
?>
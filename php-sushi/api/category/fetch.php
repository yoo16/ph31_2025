<?php
require_once '../../app.php';

use App\Models\Category;

// Modelでカテゴリ情報を取得
$categoryModel = new Category();
$categories = $categoryModel->fetch();

// TODO: JSON形式で出力
// status: success
// categories: $categories
// オプション: JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
$json = json_encode([
    'status' => 'success',
    'categories' => $categories
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

echo $json;
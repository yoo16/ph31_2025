<?php   
require_once '../../app.php';

use App\Models\Product;

$productModel = new Product();
$products = $productModel->fetch();

// TODO: JSON形式で出力
// status: success
// categories: $products
// オプション: JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT
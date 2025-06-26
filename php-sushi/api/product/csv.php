<?php   
require_once '../../app.php';

use App\Models\Product;

$productModel = new Product();
$products = $productModel->fetch();

// TODO: CSVダウンロード
header('Content-Type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="products.csv"');
header('Pragma: no-cache');
header('Expires: 0');

$output = fopen('php://output', 'w');
// ヘッダー行
fputcsv($output, ['id', 'name', 'price', 'image_path', 'category_id', 'created_at', 'updated_at']);
// データ行
foreach ($products as $product) {
    // TODO: fputcsv() で出力
    // id, name, price, image_path, category_id, created_at, updated_at
}
fclose($output);
exit;
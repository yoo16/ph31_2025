<?php   
require_once '../../app.php';

use App\Models\Category;

$categoryModel = new Category();
$catgories = $categoryModel->fetch();

// TODO: CSVダウンロード
// header('Content-Type: text/csv; charset=UTF-8');
// header('Content-Disposition: attachment; filename="categories.csv"');
// header('Pragma: no-cache');
// header('Expires: 0');

$output = fopen('php://output', 'w');
// ヘッダー行
fputcsv($output, ['id', 'name', 'sort_order', 'created_at', 'updated_at']);
// データ行
foreach ($catgories as $category) {
    fputcsv($output, [
        $category['id'],
        $category['name'],
        $category['sort_order'],
        $category['created_at'],
        $category['updated_at']
    ]);
}
fclose($output);
exit;
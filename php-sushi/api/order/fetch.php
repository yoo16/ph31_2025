<?php   
require_once '../../app.php';

use App\Models\Order;

$visit_id = $_GET['visit_id'] ?? null;
if (!$visit_id) {
    http_response_code(400);
    echo json_encode(["error" => "visit_id が必要です"]);
    exit;
}

$orderModel = new Order();
$orders = $orderModel->fetchByVisitId($visit_id);

$total = 0;
foreach ($orders as $order) {
    $total += $order['price'] * $order['quantity'];
}

echo json_encode([
    'status' => 'success',
    'orders' => $orders,
    'total' => $total,
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
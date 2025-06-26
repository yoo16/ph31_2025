<?php

require_once '../../app.php';

use App\Models\Order;
use App\Models\Product;

header("Content-Type: application/json");

// JSONデータを取得してデコード
$input = json_decode(file_get_contents("php://input"), true);
$productId = $input['product_id'] ?? null;
$quantity = $input['quantity'] ?? null;
$visitId = $input['visit_id'] ?? null;

if (!$productId || !$quantity || !$visitId) {
    http_response_code(400);
    echo json_encode(["error" => "Missing required fields"]);
    exit;
}

$productModel = new Product();
$product = $productModel->find($productId);
$price = $product['price'];

$data = [
    'visit_id'   => $visitId,
    'product_id' => $productId,
    'quantity'   => $quantity,
    'price'   => $price,
];

$orderModel = new Order();
$id = $orderModel->add($data);

if (!$id) {
    http_response_code(500);
    echo json_encode(["error" => "Failed to add order"]);
    exit;
}
echo json_encode(["success" => true, "data" => $data]);
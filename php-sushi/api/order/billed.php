<?php
require_once "../../app.php";

use App\Models\Order;
use App\Models\Visit;

$visit_id = $_GET['visit_id'] ?? null;
if (!$visit_id) {
    http_response_code(400);
    echo json_encode(["error" => "visit_id が必要です"]);
    exit;
}
$orderModel = new Order();
$total = $orderModel->total($visit_id);

// 会計済みのセッションを更新
$visitModel = new Visit();
$result = $visitModel->billed($visit_id, $total);

if (!$result) {
    http_response_code(500);
    echo json_encode(["error" => "Failed to update visit status"]);
    exit;
}
echo json_encode(["success" => true, "total" => $total]);

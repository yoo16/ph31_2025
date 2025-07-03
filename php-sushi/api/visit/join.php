<?php
require_once '../../app.php';

use App\Models\Visit;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

$json = file_get_contents('php://input');
$data = json_decode($json, true);
$seat_id = $data['seat_id'] ?? 0;

if ($seat_id <= 0) {
    $result = [
        'status' => 'error',
        'message' => '無効な席IDです。',
    ];
    echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

// Modelで来店セッション情報を取得
$visitModel = new Visit();
// 席がすでに使用中の場合
$visit = $visitModel->exists($seat_id);

// 席がなければ新規作成
if (!$visit) {
    $visit_id = $visitModel->create($seat_id);
    $visit = $visitModel->find($visit_id);
}
echo json_encode($result = [
    'status' => 'success',
    'visit' => $visit,
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

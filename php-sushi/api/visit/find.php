<?php
require_once '../../app.php';

use App\Models\Visit;

$id = $_GET['id'] ?? 0;

$visitModel = new Visit();
$visit = $visitModel->find($id);
if (!$visit) {
    // 来店セッションが見つからない場合のエラーレスポンス
    echo json_encode([
        'status' => 'error',
        'message' => "{$id} 指定された来店セッションが見つかりません。",
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

echo json_encode($result = [
    'status' => 'success',
    'visit' => $visit,
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

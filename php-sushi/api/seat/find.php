<?php
require_once '../../app.php';

use App\Models\Seat;

$seat_id = $_GET['id'] ?? 0;

// Modelでカテゴリ情報を取得
$seatModel = new Seat();
$seat = $seatModel->find($seat_id);

if (!$seat) {
    // 席が見つからない場合のエラーレスポンス
    echo json_encode([
        'status' => 'error',
        'message' => '指定された席が見つかりません。',
    ], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    exit;
}

// JSON形式で出力
echo json_encode([
    'status' => 'success',
    'seat' => $seat
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
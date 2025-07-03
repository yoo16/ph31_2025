<?php
require_once '../../app.php';

use App\Models\Seat;

// Modelでカテゴリ情報を取得
$seatModel = new Seat();
$seats = $seatModel->fetch();

// JSON形式で出力
echo json_encode([
    'status' => 'success',
    'seats' => $seats
], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
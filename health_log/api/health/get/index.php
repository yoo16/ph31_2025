<?php
require_once '../../../app.php';

// データベース接続
$pdo = Database::getInstance();
// health_records から最新30件取得
$sql = "";
// プリペアドステートメントを作成
$stmt = $pdo->prepare($sql);
// SQLを実行
$stmt->execute();
// 結果を取得
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

// レスポンスヘッダーを設定
header('Content-Type: application/json');
// $data を json_encode() でJSON形式にして、echo で出力
echo json_encode($data);
?>
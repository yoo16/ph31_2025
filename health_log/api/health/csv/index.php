<?php
// 共通処理を読み込む
require_once '../../../app.php';

// データベース接続
$pdo = Database::getInstance();
// 最新30件のデータ取得（recorded_atの降順）
$sql = "SELECT recorded_at, weight, heart_rate, systolic, diastolic 
        FROM health_records 
        ORDER BY recorded_at DESC 
        LIMIT 30";
$stmt = $pdo->query($sql);
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 出力バッファを使って直接出力
$output = fopen('php://output', 'w');
// CSVファイル名
$csv_file = 'health_records_latest.csv';
// ヘッダー：ダウンロード用にCSV形式を指定
header("Content-Type: text/csv; charset=utf-8");
header("Content-Disposition: attachment; filename={$csv_file}");

// CSVのヘッダー行
fputcsv($output, ['recorded_at', 'weight', 'heart_rate', 'systolic', 'diastolic']);
// TODO: CSVのデータを foreach で繰り返し出力

fclose($output);
exit;
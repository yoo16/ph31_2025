<?php
// 共通処理を読み込む
require_once 'app.php';

// POSTリクエストでない場合は終了
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// POSTリクエストからIDを取得
$id = $_POST['id'] ?? 0;

if ($id > 0) {
    // データベース接続
    $pdo = Database::getInstance();
    // SQLクエリ
    $sql = "DELETE FROM health_records WHERE id = :id";
    // プリペアドステートメントを作成
    $stmt = $pdo->prepare($sql);
    // SQLを実行
    $stmt->execute([':id' => $id]);
}

// 削除後は履歴ページにリダイレクト
header("Location: history.php");
exit;
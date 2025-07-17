<?php
// 共通処理を読み込む
require_once 'app.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// TODO: POSTデータの取得
$posts = [];

// セッション(form)で入力値を保持
$_SESSION['form'] = $posts;

if (hasDuplicate($posts)) {
    // 重複があればエラーメッセージを表示
    $_SESSION['message'] = 'この日付の記録はすでに存在します。';
    header("Location: add.php");
    exit;
} else {
    insert($posts);
    header('Location: history.php');
    exit;
}

function insert($posts)
{
    // データベース接続
    $pdo = Database::getInstance();
    // SQLクエリ
    $sql = "INSERT INTO health_records (weight, heart_rate, systolic, diastolic, recorded_at) 
            VALUES (:weight, :heart_rate, :systolic, :diastolic, :recorded_at)";
    // プリペアドステートメントを作成
    $stmt = $pdo->prepare($sql);
    // SQLを実行
    $stmt->execute([
        ':weight' => $posts['weight'],
        ':heart_rate' => $posts['heart_rate'],
        ':systolic' => $posts['systolic'],
        ':diastolic' => $posts['diastolic'],
        ':recorded_at' => $posts['recorded_at'],
    ]);
}

function hasDuplicate($posts)
{
    // データベース接続
    $pdo = Database::getInstance();
    // reported_at が重複しているか確認
    $sql = "SELECT id FROM health_records WHERE recorded_at = :recorded_at";
    // プリペアドステートメントを作成
    $stmt = $pdo->prepare($sql);
    // SQLを実行
    $stmt->execute([':recorded_at' => $posts['recorded_at']]);
    // 結果を取得
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    // レコードが存在するか boolean を返す
    return (bool) $row;
}

<?php
// 設定ファイル読み込み
require_once '../env.php';

// 変数設定
$db_connection = DB_CONNECTION;
$db_name = DB_DATABASE;
$db_host = DB_HOST;
$db_port = DB_PORT;
$db_user = DB_USERNAME;
$db_password = DB_PASSWORD;

// DSN設定
$dsn = "{$db_connection}:dbname={$db_name};host={$db_host};port={$db_port};charset=utf8;";

// PDO接続
try {
    $pdo = new PDO($dsn, $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO Test</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="mx-auto bg-white p-6">
        <h2 class="text-2xl text-center p-2">接続情報</h2>
        <div class="grid grid-cols-2 gap-2 bg-gray-200 p-6 rounded-md">
            <div>DB_CONNECTION</div>
            <div><?= $db_connection ?></div>
            <div>DB_DATABASE</div>
            <div><?= $db_name ?></div>
            <div>DB_HOST</div>
            <div><?= $db_host ?></div>
            <div>DB_PORT</div>
            <div><?= $db_port ?></div>
            <div>DB_USERNAME</div>
            <div><?= $db_user ?></div>
            <div>DB_PASSWORD</div>
            <div><?= $db_password ?></div>
        </div>

        <h2 class="text-2xl text-center p-2">PDO</h2>
        <div class="bg-gray-200 p-6 rounded-md">
            <?= var_dump($pdo) ?>
        </div>
    </main>
</body>

</html>
<?php
$dbFile = __DIR__ . "/mypix.sqlite";

// ディレクトリが存在しない場合に作成
$dir = dirname($dbFile);
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

try {
    // ファイルが存在するかどうかを判定
    $newDb = !file_exists($dbFile);
    // SQLiteのDSNを設定
    $dsn = "sqlite:" . $dbFile;
    // TODO: PDOでSQLiteに接続

    if ($newDb) {
        // 新規ファイルができたときにテーブルを初期化
        createTables();
    }
} catch (PDOException $e) {
    echo "❌ DB接続エラー: " . htmlspecialchars($e->getMessage());
}

// テーブル作成
function createTables()
{
    global $pdo;
    if (!$pdo) return;

    $ddl = "CREATE TABLE IF NOT EXISTS notices (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT NOT NULL,
                body TEXT,
                image TEXT,
                created_at TEXT DEFAULT CURRENT_TIMESTAMP
            )";
    $pdo->exec($ddl);
}

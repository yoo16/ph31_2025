<?php
class Database
{
    private static $instance = null;
    public $pdo;

    private function __construct()
    {
        $connection = DB_CONNECTION;
        $db_name = DB_NAME;
        $db_host = DB_HOST;
        $db_user = DB_USER;
        $db_pass = DB_PASS;
        $db_port = DB_PORT;
        if (empty($connection) || empty($db_name) || empty($db_host)
            || empty($db_user) || empty($db_port)
        ) {
            exit("データベースの接続情報が不足しています。 env.phpを確認してください。");
        }
        // DSNの作成
        $dsn = "$connection:dbname=$db_name;host=$db_host;charset=utf8;port=$db_port";
        try {
            // PDOインスタンスの作成し、pdoプロパティに格納
            $this->pdo = new PDO($dsn, $db_user, $db_pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            error_log('Database connection failed: ' . $e->getMessage());
            throw $e;
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        // PDOインスタンスを返す
        return self::$instance->pdo;
    }
}

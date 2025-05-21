<?php
class Database
{
    private static $instance = null;
    public $pdo;

    private function __construct()
    {
        $dsn = "mysql:dbname=" . DB_DATABASE . ";host=" . DB_HOST . ";charset=utf8;port=" . DB_PORT;
        try {
            $this->pdo = new PDO($dsn, DB_USERNAME, DB_PASSWORD);
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
        return self::$instance->pdo;
    }
}
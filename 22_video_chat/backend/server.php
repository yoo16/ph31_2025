<?php
// 非推奨警告(Deprecated)を報告対象から外す
error_reporting(E_ALL & ~E_DEPRECATED);

require __DIR__ . '/vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Dotenv\Dotenv;

// Dotenvの初期化
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

class VideoChat implements MessageComponentInterface
{
    protected $clients;

    // コンストラクタ
    public function __construct()
    {
        // クライアントの管理
        $this->clients = new \SplObjectStorage;
    }

    // TODO: クライアントの接続
    public function onOpen(ConnectionInterface $conn)
    {
        // $this->clients->attach($conn);
    }

    // TODO: メッセージの送受信
    public function onMessage(ConnectionInterface $from, $msg)
    {
        // foreach ($this->clients as $client) {
        //     if ($from !== $client) {
        //         $client->send($msg);
        //         // ログ出力
        //         echo $msg . PHP_EOL;
        //     }
        // }
    }

    // クライアントの切断
    public function onClose(ConnectionInterface $conn)
    {
        $this->clients->detach($conn);
    }

    // エラー処理
    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        $conn->close();
    }
}

// サーバーの起動
$host = 'localhost';
$port = 8080;

$server = new Ratchet\App($host, $port);
$server->route('/chat', new VideoChat, ['*']);
$server->run();

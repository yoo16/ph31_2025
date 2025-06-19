<?php

namespace App\Models;

use PDO;
use PDOException;
use Database;

class Like
{
    /**
     * コンストラクタ
     *
     * インスタンス生成時にプロパティ等の初期化が必要であれば行います。
     */
    public function __construct()
    {
        // 必要に応じた初期化処理を実装
    }

    /**
     * いいねの取得
     *
     * @param int $tweet_id ツイートID
     * @param int $user_id ユーザーID
     * @return array|null いいね情報、もしくは該当する投稿がなければ null
     */
    public function fetch($tweet_id, $user_id)
    {
        if (empty($tweet_id) || empty($user_id)) {
            return null;
        }
        // var_dump($tweet_id, $user_id);
        // DB接続
        $pdo = Database::getInstance();
        // tweet_id と user_id を指定してデータ取得するSQL文
        $sql = "SELECT * FROM likes
                WHERE tweet_id = :tweet_id
                AND user_id = :user_id;";
        // SQL事前準備
        $stmt = $pdo->prepare($sql);
        // SQL実行
        $stmt->execute(['tweet_id' => $tweet_id, 'user_id' => $user_id]);
        // 結果を取得
        $like = $stmt->fetch(PDO::FETCH_ASSOC);
        return $like;
    }

    /**
     * いいねの更新
     *
     * @param int $tweet_id ツイートID
     * @param int $user_id ユーザーID
     * @return void
     */
    public function update($tweet_id, $user_id)
    {
        $value = $this->fetch($tweet_id, $user_id);
        if ($value) {
            // 既に存在している場合は削除
            $this->delete($tweet_id, $user_id);
        } else {
            // 存在していない場合は追加
            $this->insert($tweet_id, $user_id);
        }
    }

    public function insert($tweet_id, $user_id)
    {
        try {
            // DB接続
            $pdo = Database::getInstance();
            // TODO: いいねを追加するSQL文: tweet_id と user_id を指定してデータを挿入
            $sql = "INSERT INTO likes (tweet_id, user_id) 
                    VALUES (:tweet_id, :user_id)";
            // SQL事前準備
            $stmt = $pdo->prepare($sql);
            // SQL実行
            return $stmt->execute(['tweet_id' => $tweet_id, 'user_id' => $user_id]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }

    /**
     * いいねの削除
     *
     * @param int $tweet_id ツイートID
     * @param int $user_id ユーザーID
     * @return bool 成功した場合は true、失敗した場合は false
     */
    public function delete($tweet_id, $user_id)
    {
        try {
            // DB接続
            $pdo = Database::getInstance();
            // TODO: いいねを削除するSQL文
            $sql = "";
            // SQL事前準備
            $stmt = $pdo->prepare($sql);
            // SQL実行
            return $stmt->execute(['tweet_id' => $tweet_id, 'user_id' => $user_id]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }

    /**
     * いいね数のカウント
     *
     * @return int|null いいね数、もしくは該当する投稿がなければ null
     */
    public function count($tweet_id)
    {
        try {
            // DB接続
            $pdo = Database::getInstance();

            // tweet_id を指定していいね数を取得するSQL文
            $sql = "SELECT COUNT(*) AS like_count FROM likes 
                    WHERE tweet_id = :tweet_id";

            // SQL事前準備
            $stmt = $pdo->prepare($sql);
            // SQL実行
            $stmt->execute(['tweet_id' => $tweet_id]);
            // いいね数を取得
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            // いいね数を返す
            return $result['like_count'];
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }
}

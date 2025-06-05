<?php

namespace App\Models;

use PDO;
use PDOException;
use Database;
use File;

class User
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
     * ユーザデータを取得
     *
     * @param int $id ユーザID
     * @return array|null ユーザデータの連想配列、もしくは該当するユーザがなければ null
     */
    public function find(int $id)
    {
        try {
            // DB接続
            $pdo = Database::getInstance();
            // TODO: SQL作成: ユーザIDでユーザを検索
            $sql = "";
            // SQLの準備
            $stmt = $pdo->prepare($sql);
            // SQLの実行
            $stmt->execute(['id' => $id]);
            // ユーザデータを１件取得
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // ユーザを返す
            return $user;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * ユーザデータを取得
     *
     * @param string $account_name ユーザのアカウント名
     * @return array|null ユーザデータの連想配列、もしくは該当するユーザがなければ null
     */
    public function findForExists($posts)
    {
        try {
            // DB接続
            $pdo = Database::getInstance();
            // SQL作成: アカウント名またはメールアドレスでユーザを検索
            $sql = "SELECT * FROM users WHERE account_name = :account_name OR email = :email";
            // SQLの準備
            $stmt = $pdo->prepare($sql);
            // SQLの実行
            $stmt->execute([
                'account_name' => $posts['account_name'],
                'email' => $posts['email']
            ]);
            // ユーザデータを１件取得
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // ユーザを返す
            return $user;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * ユーザデータをDBに登録する
     *
     * @param array $data 登録するユーザデータ
     * @return mixed 登録成功時はユーザID、失敗時は null
     */
    public function insert($data)
    {
        try {
            // パスワードのハッシュ化
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            // DB接続
            $pdo = Database::getInstance();
            // TODO: SQL作成: ユーザデータを挿入
            $sql = "INSERT INTO users (account_name, email, password, display_name) 
                    VALUES (:account_name, :email, :password, :display_name)";
            // SQLの準備 
            $stmt = $pdo->prepare($sql);
            // SQLの実行
            $result = $stmt->execute($data);
            if ($result) {
                // 成功時に id を取得して返す
                return $pdo->lastInsertId();
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return;
    }

    /**
     * ユーザデータ更新
     *
     * @param int $id ユーザID
     * @param array $data 更新するユーザデータ
     * @return mixed 更新成功時はユーザデータの連想配列、失敗時は null
     */
    public function update($id, $data)
    {
        try {
            // 更新データバインド
            $posts['id'] = $id;
            $posts['display_name'] = $data['display_name'];
            $posts['profile'] = $data['profile'];

            // DB接続
            $pdo = Database::getInstance();
            // TODO: SQL作成: ユーザデータを更新
            $sql = "";
            // SQLの準備
            $stmt = $pdo->prepare($sql);
            // SQLの実行
            return $stmt->execute($posts);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * ユーザ認証
     *
     * @param string $account_name ユーザのアカウント名
     * @param string $password 入力されたパスワード
     * @return mixed 認証成功時はユーザデータの連想配列、失敗時はnull
     */
    public function auth($account_name, $password)
    {
        try {
            // DB接続
            $pdo = Database::getInstance();
            // TODO: SQL作成: アカウント名でユーザを検索
            $sql = "";
            // SQLの準備
            $stmt = $pdo->prepare($sql);
            // SQLの実行
            $stmt->execute([':account_name' => $account_name]);
            // ユーザデータを取得
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            // TODO: もしユーザが検索されたら、ハッシュパスワードを検証
            if ($user) {
                // TODO: ユーザを返す
                return;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
        return;
    }

    /**
     * ユーザのプロフィール画像をアップロードする
     *
     * @param int $user_id ユーザID
     * @return string|null アップロードされた画像のパス、失敗時は null
     */
    public function uploadProfileImage($user_id)
    {
        $profile_image = File::upload(PROFILE_BASE, $user_id);
        try {
            // DB接続
            $pdo = Database::getInstance();
            // SQL作成: ユーザのプロフィール画像を更新
            $sql = "UPDATE users SET profile_image = :profile_image WHERE id = :id;";
            // SQLの準備
            $stmt = $pdo->prepare($sql);
            // SQLの実行
            return $stmt->execute([
                'id' => $user_id,
                'profile_image' => $profile_image
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }

    /**
     * プロフィール画像の保存先パスを取得する
     *
     * @param int $user_id ユーザID
     * @return string プロフィール画像の保存先パス
     */
    public static function profileImage($profile_image)
    {
        // プロフィール画像のパスを取得
        $localPath = BASE_DIR . '/' . $profile_image;
        if ($profile_image && file_exists($localPath)) {
            return $profile_image . "?" . time();
        }
        return "images/me.png";
    }
}

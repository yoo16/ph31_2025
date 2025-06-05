<?php
// 共通ファイル app.php を読み込み
require_once '../../app.php';

// Userモデルをインポート
use App\Models\User;

// POSTリクエストでなければ何も表示しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}
// TODO: POSTデータ取得
$posts = $_POST;

// デバッグ用：確認したらコメントアウト
// var_dump($posts);

// セッションの APP_KEY 下の regist にPOSTデータを保存
$_SESSION[APP_KEY]['regist'] = $posts;

// Userモデルのインスタンスを生成
$user = new User();

// ユーザ重複チェック
$user_exists = $user->findForExists($posts);
if (!empty($user_exists['id'])) {
    // ユーザが既に存在する場合はエラーメッセージをセッションに保存
    $_SESSION[APP_KEY]['errors']['public'] = 'このアカウント名は既に使用されています。';
    header('Location: ../input/');
    exit;
}

// ユーザ登録
$user_id = $user->insert($posts);
// ユーザ検索
$auth_user = $user->find($user_id);

if (empty($auth_user['id'])) {
    // ログイン失敗時はログイン入力画面にリダイレクト
    header('Location: ../input/');
    exit;
} else {
    // TODO: 認証成功時はセッションにユーザデータを保存
    $_SESSION[APP_KEY]['auth_user'] = $auth_user;
    // トップページにリダイレクト
    header('Location: ../../home/');
    exit;
}

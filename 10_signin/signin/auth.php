<?php
// 共通ファイル app.php を読み込み
require_once '../app.php';

// POSTリクエストでなければ何も表示しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// TODO: セッションにPOSTデータを登録
$_SESSION['signin'] = $_POST;

// TODO: POSTリクエストされた email と password を取得
$email = $_POST['email'];
$password = $_POST['password'];

// デバッグ用
// var_dump($email, $password);
// 強制的にプログラム終了
// exit;

// TODO: ユーザ認証: new User() で auth() を実行
$user = new User();
$auth_user = $user->auth($email, $password);

// ユーザデータをデバッグ表示
// var_dump($auth_user);

if (empty($auth_user['id'])) {
    // エラーセッション
    $_SESSION['error'] = 'メールアドレスまたはパスワードが間違っています。';
    // ログイン失敗時はログイン入力画面にリダイレクト
    header('Location: input.php');
    exit;
} else {
    // TODO: 認証成功時はセッションにユーザデータ($auth_user) を保存: AuthUser::set()
    AuthUser::set($auth_user);
    // $_SESSION['auth_user'] = $auth_user;

    // TODO: トップページにリダイレクト
    exit;
}
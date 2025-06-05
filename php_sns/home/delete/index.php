<?php
// 共通ファイル app.php を読み込み
require_once('../../app.php');

use App\Models\Tweet;
use App\Models\AuthUser;

// POSTリクエスト以外は処理しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// TODO: ログインユーザチェック
$auth_user = AuthUser::checkLogin();
// TODO: ユーザがいなかったらログイン画面にリダイレクト
if (empty($auth_user['id'])) {
    header('Location: ../login/');
    exit;
}

// TODO: POSTデータを取得
$posts = sanitize($_POST);

// ログインユーザのIDと投稿のユーザIDが一致しない場合はログイン画面にリダイレクト
if ((int) $auth_user['id'] !== (int) $posts['user_id']) {
    header('Location: ../login/');
    exit;
}

// TODO: 投稿処理
$tweet = new Tweet();
$tweet_id = $tweet->delete($posts['tweet_id']);

// トップにリダイレクト
header('Location: ../');
exit;
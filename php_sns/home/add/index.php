<?php
// 共通ファイル app.php を読み込み
require_once('../../app.php');

use App\Models\Tweet;
use App\Models\AuthUser;

// POSTリクエスト以外は処理しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// ログインユーザチェック
$auth_user = AuthUser::checkLogin();

// TODO: POSTデータを取得
$posts = sanitize($_POST);

// 投稿処理
$tweet = new Tweet();
$tweet_id = $tweet->insert($auth_user['id'], $posts);

// トップにリダイレクト
header('Location: ../');
exit;
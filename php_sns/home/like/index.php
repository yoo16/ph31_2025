<?php
require_once '../../app.php';

use App\Models\Like;
use App\Models\AuthUser;

// POSTリクエスト以外は処理しない
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    exit;
}

// ログインユーザチェック
$auth_user = AuthUser::checkLogin();
// ユーザがいなかったらログイン画面にリダイレクト
if (empty($auth_user['id'])) {
    header('Location: ../login/');
    exit;
}

$tweet_id = $_POST['tweet_id'] ?? null;
$user_id = $_POST['user_id'] ?? null;

if ($tweet_id && $user_id) {
    // tweet_id と user_id があれば、いいねの更新
    $like = new Like();
    $like->update($tweet_id, $user_id);
}

// 前の画面にリダイレクト
header('Location: ../');
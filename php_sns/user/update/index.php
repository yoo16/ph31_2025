<?php
require_once "../../app.php";

use App\Models\AuthUser;
use App\Models\User;

// ログインチェック
$auth_user = AuthUser::checkLogin();

// POSTデータのサニタイズ
$posts = sanitize($_POST);
// データ更新
$user = new User();
$user->update($auth_user['id'], $posts);

// ユーザ情報をセッションに再登録
$_SESSION[APP_KEY]['auth_user'] = $user->find($auth_user['id']);

// リダイレクト
header('Location: ../');
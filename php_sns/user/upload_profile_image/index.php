<?php
require_once "../../app.php";

use App\Models\AuthUser;
use App\Models\User;

// ログインチェック
$auth_user = AuthUser::checkLogin();

$user = new User();
// 画像アップロード
$user->uploadProfileImage($auth_user['id']);
// ユーザ情報をセッションに保存
$_SESSION[APP_KEY]['auth_user'] = $user->find($auth_user['id']);
// 編集画面にリダイレクト
header('Location: ../edit/');
<?php
require_once '../app.php';

// TODO: 認証ユーザのセッションをクリア
AuthUser::clear();
// unset($_SESSION['auth_user']);

// signin にリダイレクト
header('Location: ../signin/');

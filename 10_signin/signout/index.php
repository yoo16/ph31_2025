<?php
require_once '../app.php';

// TODO: 認証ユーザのセッションをクリア

// signin にリダイレクト
header('Location: ../signin/');

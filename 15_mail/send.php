<?php
// TODO: セッション開始
session_start();

// Contactクラス読み込み
require './Contact.php';

// TODO: POSTデータ受け取り
$name  = (isset($_POST['name'])) ? $_POST['name'] : "";
$email = (isset($_POST['email'])) ? $_POST['email'] : "";
$body  = (isset($_POST['body'])) ? $_POST['body'] : "";

// デバッグ用（確認したコメントアウトすること）
// var_dump($name, $email, $body);
// exit;

// TODO: セッションデータ保存
$_SESSION['name'] = $name;
$_SESSION['email'] = $email;
$_SESSION['body'] = $body;

// Contactクラスのインスタンス化
$contact = new Contact();

// TODO: メール送信: send() : $name, $email, $body

// TODO: 結果画面へリダイレクト: result.php
exit;
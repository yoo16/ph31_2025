<?php
// TODO: セッション開始

// Contactクラス読み込み
require './Contact.php';

// TODO: POSTデータ受け取り
$name  = (isset($_POST['name'])) ? $_POST['name'] : "";
$email = (isset($_POST['email'])) ? $_POST['email'] : "";
$body  = (isset($_POST['body'])) ? $_POST['body'] : "";

// TODO: セッションデータ保存
$_SESSION['name'];
$_SESSION['email'];
$_SESSION['body'];

// Contactクラスのインスタンス化
$contact = new Contact();

// TODO: メール送信: send() : $name, $email, $body

// TODO: 結果画面へリダイレクト: result.php
exit;
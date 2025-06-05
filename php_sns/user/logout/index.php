<?php
require_once "../../app.php";

if (isset($_SESSION[APP_KEY]['auth_user'])) {
    // TODO: セッションの APP_KEY 下の auth_user を削除: unset()
}

// TODO: ログイン画面にリダイレクト: ../../login/
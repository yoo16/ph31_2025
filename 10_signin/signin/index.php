<?php
require_once "../app.php";

if (isset($_SESSION['signin'])) {
    unset($_SESSION['signin']);
}
// リダイレクト
header('Location: input.php');

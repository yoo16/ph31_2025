<?php
require_once "../app.php";

if (isset($_SESSION[APP_KEY]['login'])) {
    unset($_SESSION[APP_KEY]['login']);
}
header('Location: ./input/');
exit;
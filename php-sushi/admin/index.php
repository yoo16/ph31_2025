<?php
require_once __DIR__ . '/../app.php';

use App\Controllers\Admin\HomeController;

$controller = new HomeController();
$controller->index();
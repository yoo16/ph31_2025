<?php
require_once __DIR__ . '/../../app.php';

use App\Controllers\Admin\CategoryController;

$controller = new CategoryController();
$controller->edit();
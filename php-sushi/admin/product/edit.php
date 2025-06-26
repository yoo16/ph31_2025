<?php
require_once __DIR__ . '/../../app.php';

use App\Controllers\Admin\ProductController;

$controller = new ProductController();
$controller->edit();
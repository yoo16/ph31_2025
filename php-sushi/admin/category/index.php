<?php
require_once __DIR__ . '/../../app.php';

use App\Controllers\Admin\CategoryController;

$categoryController = new CategoryController();
$categoryController->index();

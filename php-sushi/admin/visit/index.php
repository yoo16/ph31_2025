<?php
require_once __DIR__ . '/../../app.php';

use App\Controllers\Admin\VisitController;

$controller = new VisitController();
$controller->index();
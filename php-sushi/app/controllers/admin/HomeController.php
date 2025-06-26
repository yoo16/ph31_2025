<?php
namespace App\Controllers\Admin;

require_once __DIR__ . '/../../../app.php';

class HomeController
{
    public function __construct() {}

    /**
     * トップページ表示
     */
    public function index()
    {
        require APP_DIR . 'views/admin/home/index.php';
    }

}
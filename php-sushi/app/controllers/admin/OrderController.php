<?php
namespace App\Controllers\Admin;

require_once __DIR__ . '/../../../app.php';

use App\Models\Order;

class OrderController
{
    /**
     * 注文の一覧を表示
     *
     * @return void
     */
    public function index()
    {
        // ビューを読み込む
        require VIEW_DIR . 'admin/order/index.php';
    }

    /**
     * 注文の詳細を表示
     *
     * @param int $orderId
     * @return void
     */
    public function show()
    {
        require VIEW_DIR . 'admin/order/show.php';
    }
}

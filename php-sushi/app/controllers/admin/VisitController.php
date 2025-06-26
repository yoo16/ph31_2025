<?php

namespace App\Controllers\Admin;

require_once __DIR__ . '/../../../app.php';

use App\Models\Visit;

class VisitController
{
    /**
     * 訪問一覧を表示
     *
     * @return void
     */
    public function index()
    {
        // Modelで訪問情報を取得
        $visitModel = new Visit();
        $visits = $visitModel->fetch();

        // ステータスのラベルマッピング
        $statusLabels = [
            'seated' => '🪑 着席',
            'billed' => '🧾 会計済',
            'paid'   => '✅ 支払い済',
        ];
        // 各 visit に status_label を付与
        foreach ($visits as &$visit) {
            $visit['status_label'] = $statusLabels[$visit['status']] ?? $visit['status'];
        }

        // Viewの表示
        require VIEW_DIR . 'admin/visit/index.php';
    }

    /**
     * 訪問詳細を表示
     *
     * @param int $orderId
     * @return void
     */
    public function show()
    {
        require VIEW_DIR . 'admin/visit/show.php';
    }
}

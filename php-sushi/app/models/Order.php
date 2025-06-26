<?php

namespace App\Models;

use PDO;
use PDOException;
use Database;

class Order
{
    public $pdo;

    /**
     * コンストラクタ
     *
     * インスタンス生成時にプロパティ等の初期化が必要であれば行います。
     */
    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    /**
     * 訪問IDで注文を取得
     */
    public function fetchByVisitId($visit_id)
    {
        try {
            $sql = "SELECT 
                        orders.id,
                        orders.visit_id,
                        orders.product_id,
                        orders.quantity,
                        orders.price,
                        products.name AS product_name,
                        products.image_path AS product_image_path
                    FROM orders 
                    JOIN products ON orders.product_id = products.id    
                    WHERE visit_id = :visit_id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['visit_id' => $visit_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }   

    /**
     * 注文を追加
     *
     * @param array $orderData 注文データの連想配列
     * @return bool 成功した場合は true、失敗した場合は false
     */
    public function add($data)
    {
        try {
            $sql = "INSERT INTO orders (visit_id, product_id, price, quantity) 
                    VALUES (:visit_id, :product_id, :price, :quantity)";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute($data);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    /**
     * 合計金額を計算
     *
     * @param int $visit_id
     * @return int 
     */
    public function total($visit_id) {
        $orders = $this->fetchByVisitId($visit_id);
        if (!$orders) {
            return 0;
        }

        return array_reduce($orders, function ($sum, $order) {
            return $sum + ($order['price'] * $order['quantity']);
        }, 0);
    }

}

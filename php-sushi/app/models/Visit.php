<?php

namespace App\Models;

use PDO;
use PDOException;
use Database;

class Visit
{
    // status: 'seated', 'billed', 'paid'

    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance();
    }

    /**
     * 来店セッションの一覧を取得
     *
     * @return array 来店セッションの連想配列
     */
    public function fetch()
    {
        try {
            $sql = "SELECT * FROM visits ORDER BY updated_at DESC";
            $stmt = $this->pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    /**
     * 指定されたIDの来店セッションを取得
     * @param int $id
     * @return array|null
     */
    public function find($id)
    {
        try {
            $sql = "SELECT * FROM visits WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    /**
     * 指定された席IDの来店セッションが存在するかチェック
     * @param int $seatId
     * @return array|false
     */
    public function exists($seatId)
    {
        try {
            // まだ「未会計」のセッションが存在するかチェック
            $sql = "SELECT * FROM visits WHERE seat_id = :seat_id AND status != 'billed'";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['seat_id' => $seatId]);
            $existing = $stmt->fetch(PDO::FETCH_ASSOC);
            return $existing;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    /**
     * 新しい来店セッションを作成する
     *
     * @param int $seatId
     * @return int|null 作成された visit ID、失敗時は null
     */
    public function create($seatId)
    {
        try {
            $sql = "INSERT INTO visits (seat_id, status) VALUES (:seat_id, 'seated')";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['seat_id' => $seatId]);

            return (int)$this->pdo->lastInsertId();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    /**
     * 会計済みのセッションを更新する
     * 
     * @param int $visitId
     * @param float $total
     * @return bool
     */
    public function billed($visitId, $total)
    {
        try {
            // 税込み価格を計算
            $total_with_tax = (int)($total * (1 + TAX_RATE));

            $sql = "UPDATE visits 
                SET status = 'billed', total = :total, total_with_tax = :total_with_tax 
                WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([
                'total' => $total,
                'total_with_tax' => $total_with_tax,
                'id'    => $visitId,
            ]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    /**
     * 支払い済みのセッションを更新する
     * 
     * @param int $visitId
     * @return bool
     */
    public function paid($visitId)
    {
        try {
            $sql = "UPDATE visits SET status = 'paid' WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute(['id' => $visitId,]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}

<?php

namespace App\Models;

use PDO;
use PDOException;
use Database;
use File;

class Product
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
     * データ取得
     *
     * @return array|null 投稿データの連想配列、もしくは該当する投稿がなければ null
     */
    public function fetch($limit = 50)
    {
        try {
            $sql = "SELECT * FROM products LIMIT :limit;";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['limit' => $limit]);
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo ($e->getMessage());
            return null;
        }
    }

    /**
     * カテゴリーで検索して取得
     *
     * @param int $category_id カテゴリーID
     * @return array|null 
     */
    // App/Models/Product.php

    public function fetchByCategoryId($category_id)
    {
        try {
            // TODO: category_id で条件指定
            $sql = "SELECT * FROM products";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['category_id' => $category_id]);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            echo ($e->getMessage());
            return null;
        }
    }


    /**
     * IDでデータ取得
     *
     * @param int $id ID
     * @return array|null 
     */
    public function find(int $id)
    {
        try {
            $sql = "SELECT * FROM products WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            $value = $stmt->fetch(PDO::FETCH_ASSOC);
            return $value;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return null;
        }
    }

    /**
     * データをDBに登録する
     *
     * @param array $data 登録する投稿データ
     * @return mixed 登録成功時は投稿ID、失敗時は null
     */
    public function insert($data)
    {
        try {
            // 画像アップロード
            $data['image_path'] = $this->uploadImage();

            // 商品登録のSQL文
            $sql = "INSERT INTO products 
                    (name, category_id, price, image_path) 
                    VALUES (:name, :category_id, :price, :image_path)";

            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute($data);
            if ($result) {
                return $this->pdo->lastInsertId();
            }
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
        return;
    }

    /**
     * データをDBに登録する
     *
     * @param array $data
     * @return mixed 登録成功時は投稿ID、失敗時は null
     */
    public function update($data)
    {
        try {
            // 画像アップロード
            $data['image_path'] = $this->uploadImage();

            // 商品更新のSQL文
            $sql = "UPDATE products 
                    SET name = :name, 
                        category_id = :category_id,
                        price = :price,
                        image_path = :image_path
                    WHERE id = :id";

            $stmt = $this->pdo->prepare($sql);
            $result = $stmt->execute($data);
            return $result;
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
        return;
    }

    /**
     * データ削除
     *
     * @param int $id ID
     * @return mixed 
     */
    public function delete($id)
    {
        try {
            $sql = "DELETE FROM products WHERE id = :id";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute(['id' => $id]);
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
        return;
    }

    /**
     * キーワードで商品を検索
     * @param string $keyword 検索キーワード
     * @return array|null 
     */
    public function search($keyword)
    {
        try {
            // TODO: name で LIKE 検索するSQL文
            $sql = "";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['name' => "%{$keyword}%"]);
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        } catch (PDOException $e) {
            error_log($e->getMessage());
        }
    }

    /**
     * アップロード画像を取得
     *
     * @param 
     * @return bool 成功した場合は画像ファイルパス、失敗した場合は null
     */
    public function uploadImage()
    {
        $file_name = $_FILES['image']['name'];
        return File::upload(PRODUCTS_IMAGE_DIR, $file_name, 'image');
    }

}

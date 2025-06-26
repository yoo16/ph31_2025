<?php
namespace App\Controllers\Admin;

require_once __DIR__ . '/../../../app.php';

use App\Models\Category;

class CategoryController
{
    public function __construct() {}

    /**
     * カテゴリ一覧の表示
     */
    public function index()
    {
        // Modelでカテゴリ情報を取得
        $categoryModel = new Category();
        $categories = $categoryModel->fetch();

        // Viewの表示
        require VIEW_DIR . 'admin/category/index.php';
    }

    /**
     * カテゴリの登録画面表示
     */
    public function create()
    {
        // Modelから最新の並び順を取得
        $categoryModel = new Category();
        $category['sort_order'] = $categoryModel->nextSortOrder();

        // Viewの表示
        require VIEW_DIR . 'admin/category/create.php';
    }

    /**
     * カテゴリの編集画面表示
     */
    public function edit()
    {
        // GETリクエストでidを取得
        $id = $_GET['id'] ?? null;

        // Modelでカテゴリ情報を取得
        $categoryModel = new Category();
        $category = $categoryModel->find($id);

        // カテゴリが存在しない場合はトップページへリダイレクト
        if (!$category) {
            header("Location: ./");
            exit;
        }

        // Viewの表示
        require VIEW_DIR . 'admin/category/edit.php';
    }

    /**
     * カテゴリの登録処理
     */
    public function add()
    {
        // POSTリクエストでなければ終了
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            exit;
        }
        // Modelでカテゴリ情報を登録
        $categoryModel = new Category();
        $id = $categoryModel->insert($_POST);
        if ($id) {
            // IDが取得できた場合は一覧画面へリダイレクト
            header("Location: ./");
            exit;
        } else {
            // IDが取得できなかった場合は登録画面へリダイレクト
            header("Location: create.php");
            exit;
        }
    }

    /**
     * カテゴリの更新処理
     */
    public function update()
    {
        // POSTリクエストでなければ終了
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            exit;
        }
        // Modelでカテゴリ情報を更新
        $categoryModel = new Category();
        $result = $categoryModel->update($_POST);
        if ($result) {
            // 更新が成功した場合は一覧画面へリダイレクト
            header("Location: ./");
            exit;
        } else {
            // 更新が失敗した場合は編集画面へリダイレクト
            header("Location: edit.php?id=" . $_POST['id']);
            exit;
        }
    }

    /**
     * カテゴリの削除処理
     */
    public function delete()
    {
        // POSTリクエストでなければ終了
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            exit;
        }
        // Modelでカテゴリ情報を削除
        $categoryModel = new Category();
        $categoryModel->delete($_POST['id']);
        // トップページへリダイレクト
        header("Location: ./");
    }
}

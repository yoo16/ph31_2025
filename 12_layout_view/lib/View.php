<?php
class View
{
    /**
     * Viewレンダリング
     *
     * @param string $view_name レンダリングするViewの名前
     * @param array $data Viewに渡すデータ
     * @param string $layout_name 使用するレイアウトの名前
     */
    static function render(string $view_name, array $data = [], string $layout_name = 'app')
    {
        // レイアウトファイルのパス
        $layout = LAYOUT_DIR . $layout_name . '.layout.php';
        // Viewファイルのパス
        $view_path = VIEW_DIR . "{$view_name}.view.php";

        // layout_pathが存在しない場合はエラーメッセージを表示
        if (!file_exists($layout)) {
            echo "Not found {$layout}";
            exit;
        }

        // view_pathが存在しない場合はエラーメッセージを表示
        if (file_exists($view_path)) {
            if ($data) extract($data);
            include $layout;
        } else {
            echo "Not found {$view_path}";
            exit;
        }
    }
}

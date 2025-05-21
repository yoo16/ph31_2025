<?php
// 共通ファイル app.php を読み込み
require_once '../app.php';

// セッション（auth_user) からログインチェック
$auth_user = AuthUser::check();

if (empty($auth_user)) {
    // TODO: ログインしていない場合はログイン画面にリダイレクト
}
?>

<!DOCTYPE html>
<html lang="ja">

<!-- コンポーネント: components/head.php -->
<?php include COMPONENT_DIR . 'head.php'; ?>

<body>
    <?php include COMPONENT_DIR . 'nav.php'; ?>

    <main class="container mx-auto">
        <div class="mb-6 text-center">
            <h2 class="text-2xl font-semibold text-orange-500 p-4">My Page</h2>
            <div class="flex justify-center cursor-pointer">
                <img id="user-image" src="<?= $auth_user['image'] ?>" class="w-32 h-32 object-cover rounded-full">
            </div>
            <div class="text-gray-600 font-bold p-4">
                <?= $auth_user['name'] ?>
            </div>
        </div>
    </main>

</body>

</html>
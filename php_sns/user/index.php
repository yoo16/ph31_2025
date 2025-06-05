<?php
require_once '../app.php';

use App\Models\AuthUser;
use App\Models\User;
use App\Models\Tweet;

// ログインチェック
$auth_user = AuthUser::checkLogin();

// user_id が指定されていない場合は、ログインユーザのIDを使用
$user_id = $_GET['id'] ?? $auth_user['id'];

// ユーザ情報再読み込み
$user = new User();
$user_data = $user->find($user_id);
if (!$user_data) {
    // ユーザが存在しない場合は、ホームにリダイレクト
    header('Location: ../home/');
    exit;
}

// ツイート情報取得
$tweet = new Tweet();
$tweets = $tweet->getByUserID($user_data['id']);

// TODO: 投稿件数をカウント
$tweet_count = 0;
?>

<!DOCTYPE html>
<html lang="ja">

<?php include COMPONENT_DIR . 'head.php' ?>

<body>
    <div class="flex mx-auto container">
        <header class="w-1/5 p-3 border-r min-h-screen">
            <?php include COMPONENT_DIR . 'nav.php' ?>
        </header>

        <main class="w-4/5">
            <!-- components/dashboard.php 読み込み -->
            <?php include COMPONENT_DIR . 'dashboard.php' ?>

            <!-- components/tweet_list.php 読み込み -->
            <?php include COMPONENT_DIR . 'tweet_list.php' ?>
        </main>
    </div>
</body>

</html>
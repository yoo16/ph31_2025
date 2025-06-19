<?php

use App\Models\AuthUser;
use App\Models\Tweet;

// 共通ファイル app.php を読み込み
require_once('../app.php');

// ログインチェック
$auth_user = AuthUser::checkLogin();

// TODO: Tweet投稿一覧を取得: new Tweet() で get() を実行
$tweet = new Tweet();
$tweets = $tweet->get();
?>

<!DOCTYPE html>
<html lang="ja">

<!-- コンポーネント: components/head.php -->
<?php include COMPONENT_DIR . 'head.php' ?>

<body>

    <div class="flex mx-auto container">

        <header class="w-1/5 p-3 border-r min-h-screen">
            <!-- components/nav.php 読み込み -->
            <?php include COMPONENT_DIR . 'nav.php' ?>
        </header>

        <main class="w-4/5 pt-3">
            <?php include COMPONENT_DIR . 'search_form.php' ?>

            <div class="row">
                <!-- components/tweet_form.php 読み込み -->
                <?php include COMPONENT_DIR . 'tweet_form.php' ?>
            </div>

            <!-- components/tweet_list.php 読み込み -->
            <?php include COMPONENT_DIR . 'tweet_list.php' ?>
        </main>
    </div>

</body>

</html>
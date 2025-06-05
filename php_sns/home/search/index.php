<?php
// 共通ファイル app.php を読み込み

use App\Models\AuthUser;
use App\Models\Tweet;

require_once('../app.php');

// TODO: ユーザセッションの確認し、ログインしていない場合はログイン画面にリダイレクト
$auth_user = AuthUser::checkLogin();

// 検索キーワードの取得
$keyword = h($_GET['keyword'] ?? "");

$tweet = new Tweet();
$tweets = $tweet->search($keyword);
?>

<!DOCTYPE html>
<html lang="ja">

<!-- TODO: コンポーネント: components/head.php -->
<?php include COMPONENT_DIR . 'head.php' ?>

<body>

    <div class="flex mx-auto container">

        <header class="w-1/5 p-3 border-r min-h-screen">
            <!-- TODO: components/nav.php 読み込み -->
            <?php include COMPONENT_DIR . 'nav.php' ?>
        </header>

        <main class="w-4/5 pt-3">
            <div class="row">
                <!-- TODO: components/tweet_form.php 読み込み -->
                <?php include COMPONENT_DIR . 'tweet_form.php' ?>
            </div>

            <? if ($tweets) : ?>
                <?php foreach ($tweets as $value): ?>
                    <div class="row">
                        <!-- TODO: components/tweet.php 読み込み -->
                        <?php include COMPONENT_DIR . 'tweet.php' ?>
                    </div>
                <?php endforeach ?>
            <? endif ?>
        </main>
    </div>

</body>

</html>
<?php
require_once '../../app.php';

use App\Models\AuthUser;
use App\Models\Tweet;
use App\Models\Like;

$auth_user = AuthUser::checkLogin();

$id = $_GET['id'] ?? null;
if (!$id) {
    die('IDが指定されていません。');
}

$tweet = new Tweet();
$value = $tweet->findWithUser($id);
// var_dump($value);

// いいね数を取得
$like = new Like();
$value['like_count'] = $like->count($id);

if (!$value) {
    die('ツイートが見つかりません。');
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include COMPONENT_DIR . 'head.php' ?>

<body>

    <div class="flex mx-auto container">

        <header class="w-1/5 p-3 border-r min-h-screen">
            <?php include COMPONENT_DIR . 'nav.php' ?>
        </header>

        <main class="w-4/5 pt-3">
            <div class="p-5 border-b border-gray-200 pb-3">
                <a href="home/" class="font-bold">&larr; <span class="ml-4">ポスト</span></a>
            </div>

            <div class="row">
                <?php include COMPONENT_DIR . 'tweet.php' ?>
            </div>
        </main>
    </div>
</body>

</html>
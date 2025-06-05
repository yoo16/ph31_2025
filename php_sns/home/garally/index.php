<?php
require_once '../../app.php';

use App\Models\AuthUser;
use App\Models\Tweet;

// TODO: ログインユーザチェック
$auth_user = AuthUser::checkLogin();

// 画像付きの投稿を取得
$tweet = new Tweet();
$tweets = $tweet->getImages();
?>

<!DOCTYPE html>
<html lang="ja">

<?php include COMPONENT_DIR . 'head.php' ?>

<body class="bg-gray-100">

    <div class="flex mx-auto container">
        <!-- サイドナビ -->
        <header class="w-1/5 p-3 border-r min-h-screen bg-white">
            <?php include COMPONENT_DIR . 'nav.php' ?>
        </header>

        <!-- メイン -->
        <main class="w-4/5 p-6">
            <h1 class="text-2xl font-bold mb-4">メディア</h1>

            <?php if ($tweets): ?>
                <div class="gap-2 grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4">
                    <?php foreach ($tweets as $value): ?>
                        <?php if (File::has($value['image_path'])): ?>
                            <div class="overflow-hidden rounded shadow bg-white">
                                <a href="home/detail/?id=<?= $value['id'] ?>">
                                    <img src="<?= h($value['image_path']) ?>" alt=""
                                        class="w-full h-48 object-cover hover:scale-105 transition-transform duration-200">
                                </a>
                            </div>
                        <?php endif ?>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p class="text-gray-500">画像付きの投稿はまだありません。</p>
            <?php endif; ?>
        </main>
    </div>

</body>

</html>
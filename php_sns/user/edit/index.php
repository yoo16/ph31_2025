<?php
require_once '../../app.php';

use App\Models\AuthUser;
use App\Models\User;
use App\Models\Tweet;

$auth_user = AuthUser::checkLogin();

// ユーザ情報再読み込み
$user = new User();
$auth_user = $user->find($auth_user['id']);
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
            <div class="p-5 border-b border-gray-200 pb-3">
                <a href="user/?id=<?= $auth_user['id'] ?>" class="font-bold">&larr; <span class="ml-4">もどる</span></a>
            </div>
            <div class="w-full mt-3 p-5">
                <h2 class="text-2xl mb-3 font-normal font-bold text-center">プロフィールを編集</h2>
                <!-- ユーザ画像 -->
                <?php include COMPONENT_DIR . 'user_upload_image.php' ?>

                <!-- ユーザ編集フォーム -->
                <?php include COMPONENT_DIR . 'user_form.php' ?>
            </div>
        </main>
    </div>
    </div>
<?php
// 共通ファイル app.php を読み込み
require_once 'app.php';

$auth_user = AuthUser::check();
?>

<!DOCTYPE html>
<html lang="ja">

<!-- TODO: コンポーネント: components/head.php -->

<body>
    <!-- TODO: コンポーネント: components/nav.php -->

    <main class="min-h-screen flex flex-col justify-center items-center">

        <h1 class="p-6 text-4xl font-bold text-gray-800 drop-shadow text-center">
            Weolcome to PHP Form!
        </h1>

        <div class="mt-6">
            <a href="about/"
                class="inline-block px-6 py-3 bg-orange-400 text-white font-semibold rounded-xl shadow hover:bg-orange-500 transition">
                はじめる
            </a>
        </div>
    </main>
</body>

</html>
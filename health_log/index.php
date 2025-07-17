<?php
require_once 'app.php';
?>

<!DOCTYPE html>
<html lang="ja">

<!-- TODO: components/head.php 読み込み -->

<body>
    <!-- components/nav.php 読み込み -->
    <?php include 'components/nav.php'; ?>

    <main class="container mx-auto w-full">
        <section class="justify-center items-center flex flex-col bg-white p-6">
            <img src="images/top.png" class="w-1/2" alt="健康管理アプリ" />
            <h2 class="text-xl font-semibold mb-4 text-green-600">あなたの毎日を、もっと健康に。</h2>
            <div class="text-green-500 p-6 text-sm">
                体調の変化を見逃さないために、日々の健康状態を記録しましょう。
            </div>

            <div class="w-1/2 flex justify-center p-6">
                <a href="history.php" class="text-center w-full bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700">
                    はじめる
                </a>
            </div>
        </section>
    </main>

    <?php include 'components/footer.php'; ?>

    <script src="js/app.js" defer></script>
</body>

</html>
<?php
// 共通処理を読み込む
require_once 'app.php';
?>

<!DOCTYPE html>
<html lang="ja">

<?php include 'components/head.php' ?>

<body>
    <?php include 'components/nav.php' ?>

    <main class="container mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-green-600">グラフ</h1>
            <!-- ダウンロード -->
            <button onclick="downloadChart()" class="bg-green-600 text-xs text-white px-4 py-2 rounded">
                グラフダウンロード
            </button>
        </div>

        <!-- メッセージ表示エリア -->
        <div id="message" class="hidden bg-red-100 text-red-600 p-4 rounded"></div>

        <!-- グラフ -->
        <section class="mb-8">
            <canvas id="weightChart" height="150" class="mb-12"></canvas>
            <canvas id="heartRateChart" height="150" class="mb-12"></canvas>
            <canvas id="bpChart" height="150" class=""></canvas>
        </section>
    </main>

    <?php include 'components/footer.php'; ?>

    <!-- JS -->
    <script src="js/health_chart.js" defer></script>
</body>

</html>
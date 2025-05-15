<?php 
// タイムゾーンの設定
date_default_timezone_set('Asia/Tokyo');

// 現在の日付と時刻を取得
$date1 = new DateTime();

// 2022年3月10日10時30分45秒を設定
// TODO: setDate(), setTime() メソッドを使用
$date1->setDate(2022, 3, 10);
$date1->setTime(10, 30, 45);
// TODO: format(): Y-m-d H:i:s
$date_string1 = $date1->format('Y-m-d H:i:s');

// 日付2を設定し、1日加算
$date2 = new DateTime();
// TODO: 2022年3月10日10時30分45秒を設定
// TODO: 1日加算: modify('+1 day')
// TODO: format(): Y-m-d H:i:s
$date_string2 = "";

// TODO: 日付1と日付2を比較
$is_match = ($date1 < $date2);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日付比較</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">

    <main class="max-w-3xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-8">日付と比較</h1>

        <div class="grid gap-6">
            <!-- 現在の日付 -->
            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-xl font-semibold mb-2">日付</h2>
                <p><?= $date_string1 ?></p>
            </div>

            <!-- 比較 -->
            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-xl font-semibold mb-4">比較</h2>
                
                <div class="mb-4">
                    <h3 class="text-lg font-medium">日付1</h3>
                    <p><?= $date_string1 ?></p>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-medium">日付2</h3>
                    <p><?= $date_string2 ?></p>
                </div>

                <div>
                    <h3 class="text-lg font-medium">比較結果（date1 &lt; date2）</h3>
                    <p class="<?= $is_match ? 'text-green-600 font-bold' : 'text-red-600 font-bold' ?>">
                        <?= $is_match ? 'true（date1はdate2より前）' : 'false（date1はdate2と同じか後）' ?>
                    </p>
                </div>
            </div>
        </div>
    </main>

</body>
</html>

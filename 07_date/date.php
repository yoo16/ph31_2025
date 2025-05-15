<?php 
// タイムゾーン設定
date_default_timezone_set("Asia/Tokyo");
// 現在のタイムスタンプ
$now_time = time();

// TODO: x日後のタイムスタンプ
// 現在の時間 + 24時間 * 60分 * 60秒 * 日数
$day = 7;
$next_time = $now_time + (24 * 60 * 60 * $day);

// TODO: 年(Y)
$year = 0;
// TODO: 月(m)
$month = 0;
// TODO: 月の日数(t)
$days = 0;
// TODO: 現在の日付と時刻(Y/m/d H:i:s)
$today_string = "";

// TODO: 1日後のタイムスタンプ (+1 day)
$next_day_time = strtotime('');
$next_day = date('Y/m/d', $next_day_time);

// TODO: 3ヶ月前のタイムスタンプ(-3 month)
$prev_day_time = strtotime('');
$prev_day = date('Y/m/d', $prev_day_time);

// TODO: 3時間後のタイムスタンプ(+3 hour)
$next_hour_time = strtotime('');
$next_hour = date('Y/m/d H:i:s', $next_hour_time);

// TODO: 次の日曜日のタイムスタンプ(+1 sunday)
$next_week_time = strtotime('');
$next_week = date('Y/m/d H:i:s', $next_week_time);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>日付と時刻の情報</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <main class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-8">日付と時刻の情報</h1>
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- タイムスタンプ -->
            <div class="bg-white rounded-xl shadow p-4">
                <h2 class="text-xl font-semibold mb-2">現在のタイムスタンプ</h2>
                <p><?= $now_time ?></p>
            </div>

            <div class="bg-white rounded-xl shadow p-4">
                <h2 class="text-xl font-semibold mb-2"><?= $day ?>日後のタイムスタンプ</h2>
                <p><?= $next_time ?></p>
            </div>

            <!-- 年・月 -->
            <div class="bg-white rounded-xl shadow p-4">
                <h2 class="text-xl font-semibold mb-2">現在の年</h2>
                <p><?= $year ?></p>
            </div>

            <div class="bg-white rounded-xl shadow p-4">
                <h2 class="text-xl font-semibold mb-2"><?= $month ?>月の日数</h2>
                <p><?= $days ?></p>
            </div>

            <!-- 現在の日付と時刻 -->
            <div class="bg-white rounded-xl shadow p-4">
                <h2 class="text-xl font-semibold mb-2">現在の日付と時刻</h2>
                <p><?= $today_string ?></p>
            </div>

            <!-- x日後 -->
            <div class="bg-white rounded-xl shadow p-4">
                <h2 class="text-xl font-semibold mb-2">x日後</h2>
                <p>タイムスタンプ: <?= $next_day_time ?></p>
                <p>日付: <?= $next_day ?></p>
            </div>

            <!-- xヶ月前 -->
            <div class="bg-white rounded-xl shadow p-4">
                <h2 class="text-xl font-semibold mb-2">xヶ月前</h2>
                <p>タイムスタンプ: <?= $prev_day_time ?></p>
                <p>日付: <?= $prev_day ?></p>
            </div>

            <!-- x時間後 -->
            <div class="bg-white rounded-xl shadow p-4">
                <h2 class="text-xl font-semibold mb-2">x時間後</h2>
                <p>タイムスタンプ: <?= $next_hour_time ?></p>
                <p>日付: <?= $next_hour ?></p>
            </div>

            <!-- 次の曜日 -->
            <div class="bg-white rounded-xl shadow p-4">
                <h2 class="text-xl font-semibold mb-2">次の日曜日</h2>
                <p>タイムスタンプ: <?= $next_week_time ?></p>
                <p>日付: <?= $next_week ?></p>
            </div>
        </div>
    </main>
</body>
</html>

<?php
// 曜日ラベル
$week_labels = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

// 現在の日付を取得
$date = new Datetime();

// 年月を取得
$year = $_GET['year'] ?? $date->format('Y');
$month = $_GET['month'] ?? $date->format('m');

// 月の最初の日を作成
// TODO: setDate() メソッドで指定した年月の最初の日を作成
// xxxx年xx月1日
$date->setDate($year, $month, 1);

// 今月の年月に基づく DateTime オブジェクト
// 前月
// TODO: $date を clone して、１ヶ月前を作成: modify('-1 month')
$prev_month = (clone $date)->modify('-1 month');
// 翌月
// TODO: $date を clone して、１ヶ月後を作成: modify('+1 month')
$next_month = (clone $date)->modify('+1 month');

// カレンダーのセルを作成
$calendar_cells = createCells($date);

/**
 * カレンダーのセルを作成する関数
 * @param DateTime $date
 * @return array
 */
function createCells($date)
{
    $year = $date->format('Y');
    $month = $date->format('m');
    // 月の最初の日の曜日を取得
    $first_weekday = $date->format('w');
    // 月末の日付を取得
    $end_day = $date->format('t');
    // 空白マスと日付を1つの配列に
    $cells = array_fill(0, $first_weekday, null); // 先頭に空白
    // range() で 1 から月末までの配列を作成
    $days = range(1, $end_day);
    foreach ($days as $day) {
        $date = new Datetime();
        $date->setDate($year, $month, $day);
        $cells[] = $date;
    }
    return $cells;
}

// スタイル関数
function weekStyle($index)
{
    if (!is_numeric($index)) return '';
    return match (intval($index)) {
        0 => 'text-orange-500',
        6 => 'text-blue-500',
        default => ''
    };
}

function todayStyle($date): string
{
    if (!is_object($date)) return '';
    $today = new DateTime();
    return $date->format('Y-m-d') === $today->format('Y-m-d') ? 'bg-yellow-300 rounded' : '';
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>PHP Calendar</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <main class="max-w-xl mx-auto p-6 bg-white shadow rounded-lg mt-10">
        <div class="flex justify-between items-center mb-4">
            <div class="text-center text-gray-600 text-4xl font-bold mb-4"><?= $month ?></div>
            <div class="text-center text-gray-600 text-xl font-bold mb-4"><?= $year ?></div>
        </div>

        <!-- 今月・前月・次月 -->
        <div class="flex justify-between mb-4 space-x-2">
            <a href="?year=<?= $prev_month->format('Y') ?>&month=<?= $prev_month->format('m') ?>"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">前月</a>

            <a href="?" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">今月</a>

            <a href="?year=<?= $next_month->format('Y') ?>&month=<?= $next_month->format('m') ?>"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">翌月</a>
        </div>

        <!-- 曜日 -->
        <div class="grid grid-cols-7 mb-2 font-bold text-center">
            <?php foreach ($week_labels as $i => $label): ?>
                <div class="<?= weekStyle($i) ?>"><?= $label ?></div>
            <?php endforeach; ?>
        </div>

        <!-- 日付 -->
        <div class="grid grid-cols-7 gap-2 text-center">
            <?php foreach ($calendar_cells as $date): ?>
                <?php if (is_object($date)): ?>
                    <div class="py-4 text-xl <?= weekStyle($date->format('w')) ?> <?= todayStyle($date) ?>">
                        <?= $date->format('j') ?>
                    </div>
                <?php else: ?>
                    <div></div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>
<?php
// 曜日
$week_index = 1;
// 今日の曜日のインデックス
// $week_index = date("w");
// 曜日データ
// $week = ["日", "月", "火", "水", "木", "金", "土"];
$week_day = "";

// 回収
$garbage = "";
// 曜日判別
switch ($week_index) {
    case 1:
    case 3:
        $garbage = "燃えるゴミ";
        break;
    case 5:
        $garbage = "燃えないゴミ";
        break;

    default:
        $garbage = "回収なし";
        break;
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condition</title>
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="container w-1/2 mx-auto p-4">
        <h1 class="text-2xl text-center font-bold p-3">ゴミ回収</h1>
        <div class="mx-auto mt-4 border border-gray-200 p-4 rounded">
            <div class="py-5">
                <div class="py-2">
                    <span class="text-sm mr-2">曜日</span>
                    <span class="font-bold text-lg"><?= $week_day; ?></span>
                </div>
                <div class="py-2">
                    <span class="text-sm mr-2">曜日インデックス</span>
                    <span class="font-bold text-lg"><?= $week_index; ?></span>
                </div>
                <div class="py-2">
                    <span class="text-sm mr-2">ゴミ回収</span>
                    <span class="font-bold text-lg"><?= $garbage; ?></span>
                </div>
            </div>
            <button class="bg-sky-500 p-3 w-full text-white rounded-lg">決済</button>
        </div>
    </main>
</body>

</html>
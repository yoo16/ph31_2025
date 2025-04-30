<?php
// 無限ループ対策の回数
const MAX_LOOP = 500;

// 初期ローン額（GETパラメータからintで受け取る、なければデフォルト1000000）
$start_loan = $_GET['loan'] ?? 1000000;

// 月々の支払額（GETパラメータからintで受け取る、なければデフォルト20000）
$pay_by_month = $_GET['pay_by_month'] ?? 20000;

// 利息（%/年）
$interest_rate =  $_GET['interest_rate'] ?? 1;

// ローン残高
$loan = $start_loan;

// 利息
$interest = 0;

// 利息合計
$total_interest = 0;

// 支払い月数
$month = 0;

// ローンデータ初期化
$values = [];
// ローン残高が 0 より大きい間はループ
while ($loan > 0) {
    // 月を1増やす: $month
    $month++;

    // TODO: 利息 = ローン x 金利 / 12
    $interest = 0;

    // TODO: ローン残高 - (月支払い - 利息)

    // 合計利息計算
    $total_interest += $interest;

    // 表示データ作成
    $values[] = [
        'month' => $month,
        'interest' => round($interest),
        'loan' => round($loan)
    ];

    // 無限ループ対策
    if ($month >= MAX_LOOP) break;
}

// 年数計算
$year = ceil($month / 12);

// 総支払額
$total_payment = $pay_by_month * $month;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ローンシミュレーション</title>
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="container mx-auto p-4">
        <h1 class="text-2xl text-center font-bold p-3">ローンシミュレーション</h1>

        <div class="my-2">
            <form action="" method="get">
                <div class="px-4 py-2 border border-gray-300 text-left">
                    <label class="font-bold p-4" for="">総借入額</label>
                    <input class="px-4 py-2 border border-gray-300 text-right"
                        name="loan"
                        value="<?= $start_loan ?>" />
                    <label class="font-bold p-4" for="">金利</label>
                    <input class="px-4 py-2 border border-gray-300 text-right"
                        name="interest_rate"
                        value="<?= $interest_rate ?>" />
                    %
                </div>
                <div class="px-4 py-2 border border-gray-300 text-left">
                    <label class="font-bold p-4" for="">月返済額</label>
                    <input class="px-4 py-2 border border-gray-300 text-right"
                        name="pay_by_month"
                        value="<?= $pay_by_month ?>" />
                </div>
                <div class="py-2 text-center">
                    <button class="bg-sky-500 text-white px-3 py-2 rounded">計算</button>
                    <a href="?" class="inline-block bg-gray-500 text-white px-3 py-2 rounded">クリア</a>
                </div>
            </form>

            <div class="my-4">
                <table class="min-w-full table-auto border border-gray-300">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border border-gray-300 text-left">月数</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">年数</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">総利息</th>
                            <th class="px-4 py-2 border border-gray-300 text-left">総支払額</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="px-4 py-2 border border-gray-300 text-left"><?= $month ?>ヶ月</td>
                            <td class="px-4 py-2 border border-gray-300 text-left"><?= $year ?>年</td>
                            <td class="px-4 py-2 border border-gray-300"><?= number_format(round($total_interest)) ?> 円</td>
                            <td class="px-4 py-2 border border-gray-300"><?= number_format($total_payment) ?> 円</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="my-2">
            <table class="min-w-full table-auto border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300 text-left">月数</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">利息</th>
                        <th class="px-4 py-2 border border-gray-300 text-left">ローン残高</th>
                    </tr>
                </thead>
                <?php foreach ($values as $value) : ?>
                    <tr>
                        <td class="px-4 py-2 border border-gray-300"><?= $value['month'] ?></td>
                        <td class="px-4 py-2 border border-gray-300"><?= number_format($value['interest']) ?></td>
                        <td class="px-4 py-2 border border-gray-300"><?= number_format($value['loan']) ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </main>
</body>

</html>
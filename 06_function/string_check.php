<?php 
$message1 = "Hello";
// TODO: 文字の長さを取得: strlen()はバイト数を返す
$length1 = strlen($message1);

$message2 = "こんにちは";
// TODO: 文字の長さを取得: strlen()はバイト数を返す
$length2 = strlen($message2);

$message3 = "こんにちは";
// TODO: マルチバイト文字の長さを取得: mb_strlen()は文字数を返す
$length3 = mb_strlen($message3);

$address = "東京都新宿区新宿";
// TODO: 0から3文字目まで取得
$address1 = mb_substr($address, 0, 0);
// TODO: 3文字目から3文字取得
$address2 = mb_substr($address, 0, 0);
// TODO: 最後の2文字取得
$address3 = mb_substr($address, 0);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>文字列操作</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 font-sans">
    <main class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold text-center mb-8">文字列操作の例</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- strlen -->
            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-xl font-semibold mb-4">strlen()</h2>
                <div class="mb-2">
                    <p><?= $message1 ?></p>
                </div>
                <div>
                    <p><?= $length1 ?></p>
                </div>
                <div class="mt-4">
                    <p><?= $message2 ?></p>
                    <p><?= $length2 ?></p>
                </div>
            </div>

            <!-- mb_strlen -->
            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-xl font-semibold mb-4">mb_strlen()</h2>
                <p><?= $message3 ?></p>
                <p><?= $length3 ?></p>
            </div>

            <!-- mb_substr -->
            <div class="bg-white shadow rounded-xl p-6">
                <h2 class="text-xl font-semibold mb-4">mb_substr()</h2>
                <p class="mb-2"><?= $address ?></p>
                <p><strong>最初から3文字:</strong> <?= $address1 ?></p>
                <p><strong>4文字目から3文字:</strong> <?= $address2 ?></p>
                <p><strong>最後の2文字:</strong> <?= $address3 ?></p>
            </div>

        </div>
    </main>
</body>
</html>
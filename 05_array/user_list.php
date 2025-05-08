<?php
// ユーザデータ
$users = [
    [
        "id" => 1,
        "account_name" => "alice",
        "display_name" => "Alice",
        "email" => "alice@example.com",
    ],
    [
        "id" => 2,
        "account_name" => "bob",
        "display_name" => "Bob",
        "email" => "bob@example.com",
    ],
    [
        "id" => 3,
        "account_name" => "chris",
        "display_name" => "Chris",
        "email" => "chris@example.com",
        "age" => 18,
    ],
];
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザー一覧</title>
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">

    <div class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-4 text-center">ユーザー一覧</h2>
        <table class="min-w-full table-auto border border-gray-300">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-4 py-2 border border-gray-300 text-left">ID</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">アカウント名</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">メールアドレス</th>
                    <th class="px-4 py-2 border border-gray-300 text-left">ディスプレイ名</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($users): ?>
                    <!-- TODO: foreach 文を使ってユーザデータ表示 -->
                    <?php foreach ($users as $user): ?>
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-2 border border-gray-300"><?= $user['id'] ?></td>
                            <td class="px-4 py-2 border border-gray-300"></td>
                            <td class="px-4 py-2 border border-gray-300"></td>
                            <td class="px-4 py-2 border border-gray-300"></td>
                        </tr>
                    <?php endforeach ?>
                <?php endif ?>
            </tbody>
        </table>
    </div>

</body>

</html>
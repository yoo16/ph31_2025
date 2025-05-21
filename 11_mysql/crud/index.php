<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="mx-auto bg-white p-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-700">CRUD</h2>
        <div class="grid grid-cols-3 bg-gray-200 p-2 rounded-t">
            <div class="col-span-1">項目</div>
            <div class="col-span-1">サンプル</div>
            <div class="col-span-1">備考</div>
        </div>
        <div class="grid grid-cols-3 p-2">
            <div class="col-span-1">DB接続</div>
            <div><a href="connect_test.php" class="text-blue-600" target="_blank">connect_test.php</a></div>
            <div class="col-span-1">PDO</div>
        </div>
        <div class="grid grid-cols-3 p-2">
            <div class="col-span-1">DB接続</div>
            <div><a href="connect_test_for_module.php" class="text-blue-600" target="_blank">connect_test_for_module.php</a></div>
            <div class="col-span-1">PDOモジュール化</div>
        </div>
        <div class="grid grid-cols-3 p-2">
            <div class="col-span-1">ユーザ一覧</div>
            <div><a href="select_users.php" class="text-blue-600" target="_blank">select_users.php</a></div>
            <div class="col-span-1">SELECT</div>
        </div>
        <div class="grid grid-cols-3 p-2">
            <div class="col-span-1">条件検索</div>
            <div><a href="find_user.php" class="text-blue-600" target="_blank">find_user.php</a></div>
            <div class="col-span-1">SELECT, WHERE</div>
        </div>
        <div class="grid grid-cols-3 p-2">
            <div class="col-span-1">挿入</div>
            <div><a href="insert_user.php" class="text-blue-600" target="_blank">insert_user.php</a></div>
            <div class="col-span-1">INSERT</div>
        </div>
        <div class="grid grid-cols-3 p-2">
            <div class="col-span-1">更新</div>
            <div><a href="update_user.php" class="text-blue-600" target="_blank">update_user.php</a></div>
            <div class="col-span-1">UPDATE</div>
        </div>
        <div class="grid grid-cols-3 p-2">
            <div class="col-span-1">削除</div>
            <div><a href="delete_user.php" class="text-blue-600" target="_blank">delete_user.php</a></div>
            <div class="col-span-1">DELETE</div>
        </div>
        <div class="grid grid-cols-3 p-2">
            <div class="col-span-1">結合</div>
            <div><a href="user_tweets.php" class="text-blue-600" target="_blank">user_tweets.php</a></div>
            <div class="col-span-1">JOIN</div>
        </div>
    </main>
</body>

</html>
<?php
require_once '../env.php';
require_once '../lib/Database.php';

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $tweets = getByUserID($user_id);
}

// ユーザIDからツイートを取得する関数
function getByUserID($user_id, $limit = 10)
{
    $pdo = Database::getInstance();
    // TODO: SQL作成: ユーザIDに紐づくツイートを取得
    $sql = "SELECT 
                tweets.id, 
                users.display_name, 
                tweets.message, 
                tweets.created_at
            FROM tweets
            JOIN users ON tweets.user_id = users.id
            WHERE tweets.user_id = :user_id
            ORDER BY tweets.created_at DESC
            LIMIT :limit";

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user_id' => $user_id, 'limit' => $limit]);
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ユーザ一覧</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="mx-auto bg-white p-6">
        <h2 class="py-2 text-2xl mt-6">投稿一覧</h2>
        <form action="" method="get" class="mb-8">
            <div class="flex items-center gap-4">
                <label for="id" class="text-gray-600 whitespace-nowrap">ユーザID</label>
                <input
                    type="text"
                    name="user_id"
                    id="user_id"
                    class="w-48 px-4 py-2 border border-gray-300 rounded-md">
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded">
                    検索
                </button>
            </div>
        </form>

        <div class="overflow-hidden">
            <div class="grid grid-cols-4 bg-gray-300 p-2 font-bold rounded-t">
                <div>id</div>
                <div>display_name</div>
                <div>message</div>
                <div>created_at</div>
            </div>
            <?php if (!empty($tweets)): ?>
                <?php foreach ($tweets as $tweet): ?>
                    <div class="grid grid-cols-4 border-b border-gray-200 p-2">
                        <div><?= $tweet['id'] ?></div>
                        <div><?= $tweet['display_name'] ?></div>
                        <div><?= $tweet['message'] ?></div>
                        <div><?= $tweet['created_at'] ?></div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
</body>

</html>
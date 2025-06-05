<?php
// 共通アプリファイル読み込み
require_once "../../app.php";

$regist = [];
if (isset($_SESSION[APP_KEY]['regist'])) {
    // TODO: セッション APP_KEY の regist があれば取得
    $regist;
}

$errors = [];
if (isset($_SESSION[APP_KEY]['errors'])) {
    // セッションからエラー情報を取得
    $errors = $_SESSION[APP_KEY]['errors'];
    $error = $errors['public'] ?? '';
    // TODO: セッション APP_KEY の errors があれば削除: unset()
}
?>

<!DOCTYPE html>
<html lang="ja">

<!-- TODO: components/head.php を読み込み -->
<?php include COMPONENT_DIR . 'head.php'; ?>

<body>
    <main id="regist" class="flex justify-center">
        <div class="w-1/2 mt-3 p-5 shadow-md">
            <h2 class="text-2xl mb-3 font-normal text-center">Sign Up</h2>
            <!-- regist/add/ に POSTリクエスト -->
            <form action="regist/add/" method="post">
                <div class="relative mb-4">
                    <input type="text" name="account_name"
                        value="<?= $regist['account_name'] ?? '' ?>"
                        id="account_name"
                        class="block
                        px-2.5 pb-2.5 pt-6 mb-3
                        w-full rounded-lg
                        text-sm 
                        text-gray-900 
                        ring-1 ring-gray-300 
                        focus:outline-none 
                        focus:ring-1 
                        focus:ring-blue-600 
                        peer"
                        placeholder=" "
                        required>
                    <label for="account_name" class="absolute 
                        text-sm text-gray-400 
                        duration-300 
                        transform -translate-y-4 scale-75 
                        top-4 
                        origin-[0] start-2.5 
                        peer-focus:px-0
                        peer-focus:text-blue-600 
                        peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 
                        peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 
                        peer-focus:-translate-y-4">
                        アカウント名
                    </label>
                </div>
                <div class="relative mb-4">
                    <input type="email" name="email"
                        value="<?= $regist['email'] ?? '' ?>"
                        id="email"
                        class="block
                        px-2.5 pb-2.5 pt-6 mb-3
                        w-full rounded-lg
                        text-sm 
                        text-gray-900 
                        ring-1 ring-gray-300 
                        focus:outline-none 
                        focus:ring-1 
                        focus:ring-blue-600 
                        peer"
                        placeholder=" "
                        required>
                    <label for="email" class="absolute 
                        text-sm text-gray-400 
                        duration-300 
                        transform -translate-y-4 scale-75 
                        top-4 
                        origin-[0] start-2.5 
                        peer-focus:px-0
                        peer-focus:text-blue-600 
                        peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 
                        peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 
                        peer-focus:-translate-y-4">
                        Email
                    </label>
                </div>
                <div class="relative mb-4">
                    <input type="password" name="password"
                        id="password"
                        class="block
                        px-2.5 pb-2.5 pt-6 mb-3 
                        w-full rounded-lg
                        text-sm 
                        text-gray-900 
                        ring-1 ring-gray-300 
                        focus:outline-none 
                        focus:ring-1 
                        focus:ring-blue-600 
                        peer"
                        placeholder=" "
                        required>
                    <label for="password" class="absolute 
                        text-sm text-gray-400 
                        duration-300 
                        transform -translate-y-4 scale-75 
                        top-4 
                        origin-[0] start-2.5 
                        peer-focus:px-0
                        peer-focus:text-blue-600 
                        peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 
                        peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 
                        peer-focus:-translate-y-4">
                        パスワード
                    </label>
                </div>

                <!-- display_name -->
                <div class="relative mb-4">
                    <input type="text" name="display_name"
                        value="<?= $regist['display_name'] ?? '' ?>"
                        id="display_name"
                        class="block
                        px-2.5 pb-2.5 pt-6 mb-3
                        w-full rounded-lg
                        text-sm 
                        text-gray-900 
                        ring-1 ring-gray-300 
                        focus:outline-none 
                        focus:ring-1 
                        focus:ring-blue-600 
                        peer"
                        placeholder=" "
                        required>
                    <label for="display_name" class="absolute 
                        text-sm text-gray-400 
                        duration-300 
                        transform -translate-y-4 scale-75 
                        top-4 
                        origin-[0] start-2.5 
                        peer-focus:px-0
                        peer-focus:text-blue-600 
                        peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 
                        peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 
                        peer-focus:-translate-y-4">
                        ディスプレイ名
                    </label>
                </div>

                <!-- エラーメッセージ -->
                <?php include COMPONENT_DIR . 'error_message.php'; ?>

                <div>
                    <button id="submit_button" class="w-full
                        mb-2 py-2 px-4 bg-sky-500 
                        hover:bg-sky-700 
                        text-white 
                        rounded-lg
                        disabled:bg-blue-300">
                        Sign Up
                    </button>
                </div>
            </form>
            <div>
                <p class="text-sm text-center ">
                    <a href="login/" class="p-3 text-blue-600 hover:underline">アカウントをお持ちの方はこちら</a>
                </p>
                <p class="text-sm text-center">
                    <button onclick="inputTestRegistUser()" class="p-3 text-gray-600 hover:underline">Test Input</button>
                </p>
            </div>
        </div>
    </main>
</body>

</html>
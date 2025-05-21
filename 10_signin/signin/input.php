<?php
// 共通アプリファイル読み込み
require_once "../app.php";

// TODO: 入力フォーム
$form = [];
if (isset($_SESSION['signin'])) {
    // TODO: セッション(signin)から入力データを取得
    $form = [];
    unset($_SESSION['signin']);
}

// TODO: エラーメッセージ
$error = "";
if (isset($_SESSION['error'])) {
    // TODO: セッション(error)からエラーメッセージを取得
    $error = "";
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include COMPONENT_DIR . 'head.php' ?>

<body>
    <?php include COMPONENT_DIR . 'nav.php'; ?>

    <main class="flex flex-col justify-center items-center p-6">
        <div class="w-1/2 mt-3 p-5">
            <h2 class="text-2xl mb-3 font-bold text-orange-500 text-center">Sign in</h2>

            <!-- エラーメッセージ -->
            <?php include COMPONENT_DIR . 'error_message.php'; ?>

            <form action="signin/auth.php" method="post">
                <div class="relative mb-4">
                    <div class="relative mb-4">
                        <input type="text" name="email" id="email"
                            class="block px-2.5 pb-2.5 pt-6 mb-3 w-full rounded-lg
                                    text-sm text-gray-900 ring-1 ring-gray-300 peer"
                            value="<?= $form['email'] ?? '' ?>"
                            placeholder=" " required>
                        <label for="email" class="absolute 
                        text-sm text-gray-400 
                        duration-300 
                        transform -translate-y-4 scale-75 
                        top-4">
                            メールアドレス
                        </label>
                    </div>
                    <div class="relative mb-4">
                        <input type="password" name="password"
                            id="password" 
                            class="block px-2.5 pb-2.5 pt-6 mb-3 w-full rounded-lg
                                    text-sm text-gray-900 ring-1 ring-gray-300 peer"
                            placeholder=" " required>
                        <label for="password" class="absolute 
                        text-sm text-gray-400 
                        duration-300 
                        transform -translate-y-4 scale-75 
                        top-4">
                            パスワード
                        </label>
                    </div>

                    <div>
                        <button id="submit_button" class="w-full
                        mb-2 py-2 px-4 bg-orange-500 
                        hover:bg-orange-700 
                        text-white 
                        rounded-lg
                        disabled:bg-blue-300">
                            Sign in
                        </button>
                    </div>
                </div>
            </form>

            <div>
                <p class="text-sm text-center">
                    <button onclick="inputTestLoginUser()" class="p-3 text-gray-600 hover:underline">Test Input</button>
                </p>
            </div>
        </div>
    </main>
</body>

</html>
<?php
// 共通アプリファイル読み込み
require_once "../../app.php";

$form = [];
if (isset($_SESSION[APP_KEY]['login'])) {
    $form = $_SESSION[APP_KEY]['login'];
}
?>

<!DOCTYPE html>
<html lang="ja">

<?php include COMPONENT_DIR . 'head.php' ?>

<body>
    <main id="login" class="flex justify-center">
        <div class="w-1/2 mt-3 p-5 shadow-md">
            <h2 class="text-2xl mb-3 font-normal text-center">Sign in</h2>
            <form action="login/auth/" method="post">
                <div class="relative mb-4">
                    <div class="relative mb-4">
                        <input type="text" name="account_name" id="account_name" class="block
                        px-2.5 pb-2.5 pt-6 mb-3
                        w-full rounded-lg
                        text-sm 
                        text-gray-900 
                        ring-1 ring-gray-300 
                        focus:outline-none 
                        focus:ring-1 
                        focus:ring-blue-600 
                        peer" 
                        value="<?= $form['account_name'] ?? '' ?>"
                        placeholder=" " required>
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
                        <input type="password" name="password" id="password" class="block
                        px-2.5 pb-2.5 pt-6 mb-3 
                        w-full rounded-lg
                        text-sm 
                        text-gray-900 
                        ring-1 ring-gray-300 
                        focus:outline-none 
                        focus:ring-1 
                        focus:ring-blue-600 
                        peer" placeholder=" " required>
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


                    <div>
                        <button id="submit_button" class="w-full
                        mb-2 py-2 px-4 bg-sky-500 
                        hover:bg-sky-700 
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
                    <a href="regist/" class="text-blue-600 hover:underline">アカウントをお持ちでない方はこちら</a>
                </p>
                <p class="text-sm text-center">
                    <button onclick="inputTestLoginUser()" class="p-3 text-gray-600 hover:underline">Test Input</button>
                </p>
            </div>
        </div>
    </main>
</body>

</html>
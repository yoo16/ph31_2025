<?php
// 共通ファイル app.php を読み込み
require_once '../app.php';

$auth_user = AuthUser::check();
?>

<!DOCTYPE html>
<html lang="ja">

<!-- コンポーネント: components/head.php -->
<?php include COMPONENT_DIR . 'head.php'; ?>

<body>
    <?php include COMPONENT_DIR . 'nav.php'; ?>

    <main class="container mx-auto">
        <h2 class="text-center text-2xl font-semibold text-orange-500 p-4">About</h2>

        <div class="text-gray-600">

            <h3 class="py-4 text-xl font-semibold">ページ＆アクション</h3>
            <table class="text-xs w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="text-left bg-gray-200">
                        <th class="p-2">ページ</th>
                        <th class="p-2">エンドポイント</th>
                        <th class="p-2">ファイル名</th>
                        <th class="p-2">HTTPメソッド</th>
                        <th class="p-2">その他</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="p-2">トップページ</td>
                        <td class="p-2">/</td>
                        <td class="p-2">index.php</td>
                        <td class="p-2">GET</td>
                        <td class="p-2"></td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">About</td>
                        <td class="p-2">about/</td>
                        <td class="p-2">about/index.php</td>
                        <td class="p-2">GET</td>
                        <td class="p-2"></td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">ログイントップ</td>
                        <td class="p-2">signin/</td>
                        <td class="p-2">signin/index.php</td>
                        <td class="p-2">GET</td>
                        <td class="p-2">`signin/input.php` にリダイレクト</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">ログイン入力画面</td>
                        <td class="p-2">signin/input.php</td>
                        <td class="p-2">signin/input.php</td>
                        <td class="p-2">GET</td>
                        <td class="p-2">前回入力をセッションで取得</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">ログイン認証処理</td>
                        <td class="p-2">signin/auth.php</td>
                        <td class="p-2">signin/auth.php</td>
                        <td class="p-2">POST</td>
                        <td class="p-2">Email、パスワードで認証、`auth_user`セッション登録</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">ログアウト処理</td>
                        <td class="p-2">signout/</td>
                        <td class="p-2">signout/index.php</td>
                        <td class="p-2">GET</td>
                        <td class="p-2">`auth_user`セッション削除</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">マイページ</td>
                        <td class="p-2">home/</td>
                        <td class="p-2">home/index.php</td>
                        <td class="p-2">GET</td>
                        <td class="p-2">`auth_user`セッションを検証してアクセス制限</td>
                    </tr>
                </tbody>
            </table>

            <h3 class="py-4 text-xl font-semibold">基本ファイル</h3>
            <table class="text-xs w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="text-left bg-gray-200">
                        <th class="p-2">ファイル名</th>
                        <th class="p-2">説明</th>
                        <th class="p-2">その他</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="p-2">app.php</td>
                        <td class="p-2">アプリ共通ファイル</td>
                        <td class="p-2">パス、セッション開始、モデル読み込みなど</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">components/head.php</td>
                        <td class="p-2">HTML `head` コンポーネント</td>
                        <td class="p-2"></td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">components/nav.php</td>
                        <td class="p-2">ナビゲーションメニュー</td>
                        <td class="p-2">`$auth_user` によって表示切り替え</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">components/error_message.php</td>
                        <td class="p-2">エラーメッセージ表示</td>
                        <td class="p-2">セッションのメッセージがあれば表示</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">images/users/{id}.png</td>
                        <td class="p-2">ユーザプロフィール画像</td>
                        <td class="p-2">PNGファイル、users.id と連携</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">data/users.csv</td>
                        <td class="p-2">ユーザデータファイル</td>
                        <td class="p-2">CSVファイル</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">app/models/User.php</td>
                        <td class="p-2">ユーザモデル</td>
                        <td class="p-2">ユーザデータ操作（読み込み、認証など）</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2">app/models/AuthUser.php</td>
                        <td class="p-2">認証ユーザモデル</td>
                        <td class="p-2">ユーザセッション管理、Userモデルを継承</td>
                    </tr>
                </tbody>
            </table>

            <h3 class="py-4 text-xl font-semibold">ユーザデータ</h3>
            <table class="text-xs w-full border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 border border-gray-300 text-left">カラム</th>
                        <th class="p-2 border border-gray-300 text-left">内容</th>
                        <th class="p-2 border border-gray-300 text-left">備考</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="p-2 border border-gray-300">`id`</td>
                        <td class="p-2 border border-gray-300">ユーザID</td>
                        <td class="p-2 border border-gray-300">整数、インクリメント</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border border-gray-300">`name`</td>
                        <td class="p-2 border border-gray-300">ユーザ名</td>
                        <td class="p-2 border border-gray-300">文字列</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border border-gray-300">`email`</td>
                        <td class="p-2 border border-gray-300">メールアドレス</td>
                        <td class="p-2 border border-gray-300">文字列</td>
                    </tr>
                    <tr class="border-b">
                        <td class="p-2 border border-gray-300">`image`</td>
                        <td class="p-2 border border-gray-300">ユーザアイコン画像パス</td>
                        <td class="p-2 border border-gray-300">文字列</td>
                    </tr>
                    <tr>
                        <td class="p-2 border border-gray-300">`password`</td>
                        <td class="p-2 border border-gray-300">パスワードハッシュ</td>
                        <td class="p-2 border border-gray-300">文字列、生パスワードをハッシュ化、サンプルデータはパスワード `1111`</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </main>

</body>

</html>
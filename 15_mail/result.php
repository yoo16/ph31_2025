<?php
// TODO: セッション開始

// TODO: セッションデータをクリア
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>お問い合わせ完了</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 p-8 text-gray-800">

    <!-- Main -->
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow text-center">
        <!-- チェックアイコン -->
        <div class="mx-auto mb-4 w-16 h-16 flex items-center justify-center rounded-full bg-green-100">
            <svg class="w-10 h-10 text-green-600" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M5 13l4 4L19 7" />
            </svg>
        </div>

        <h1 class="text-2xl font-bold mb-2">お問い合わせを受け付けました</h1>
        <p class="text-gray-600 mb-6">
            担当者が内容を確認し、必要に応じてご連絡いたします。<br>
            しばらくお待ちください。
        </p>

        <a href="./"
            class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-2 rounded">
            フォームに戻る
        </a>
    </div>
</body>
</html>
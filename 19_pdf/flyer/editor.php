<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>チラシPDFジェネレーター</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-50 text-slate-800">

    <div class="min-h-screen flex flex-col md:flex-row">
        <aside class="w-full md:w-96 bg-white shadow-xl z-10 overflow-y-auto">
            <div class="p-6 border-b border-slate-100">
                <h1 class="text-xl font-bold text-indigo-600">チラシ編集パネル</h1>
                <p class="text-xs text-slate-400 mt-1">各項目を入力してPDFを作成します</p>
            </div>

            <form id="flyerForm" action="output.php" method="POST" enctype="multipart/form-data" class="p-6 space-y-5">
                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-600">基本情報</label>
                    <input type="text" name="title" placeholder="チラシのタイトル"
                        value="特別セール開催中！"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg ">
                    <input type="text" name="dateString" placeholder="日付（例：2026年1月31日まで）"
                        value="2026年1月31日まで"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg ">
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-600">コンテンツ</label>
                    <input type="text" name="headline" placeholder="メインの見出し"
                        value="特別セール！"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg font-bold">
                    <textarea name="message" placeholder="メッセージ・詳細説明" rows="4"
                        class="w-full px-4 py-2 border border-slate-200 rounded-lg resize-none">日頃のご愛顧に感謝して、全品30%OFFの特別セールを実施いたします。</textarea>
                </div>

                <div class="space-y-2">
                    <label class="text-sm font-semibold text-slate-600">ビジュアル・価格</label>
                    <div class="relative group">
                        <input type="file" name="image"
                            class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100 cursor-pointer">
                    </div>
                    <div class="relative">
                        <span class="absolute left-3 top-2 text-slate-400">¥</span>
                        <input type="number" name="price" placeholder="価格"
                            value="10000"
                            class="w-full pl-8 pr-4 py-2 border border-slate-200 rounded-lg ">
                    </div>
                </div>

                <div class="flex gap-2">
                    <button type="button" onclick="submitPreview()"
                        class="flex-1 py-3 px-4 bg-slate-600 hover:bg-slate-700 text-white font-bold rounded-xl transition-all">
                        プレビュー
                    </button>
                    <button type="button" onclick="submitDownload()"
                        class="flex-1 py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg transition-all">
                        ダウンロード
                    </button>
                </div>
                <input type="hidden" name="mode" id="outputMode" value="inline">
            </form>
        </aside>

        <main class="flex-1 bg-slate-200 p-4">
            <iframe name="preview_frame" class="w-full h-full border-none rounded-lg shadow-inner bg-white" title="PDF Preview">
            </iframe>
        </main>
    </div>

    <script>
        const form = document.getElementById('flyerForm');
        const modeInput = document.getElementById('outputMode');

        function submitPreview() {
            // iframeに表示
            modeInput.value = 'inline';
            form.target = 'preview_frame';
            form.submit();
        }

        function submitDownload() {
            // 通常のダウンロード
            modeInput.value = 'download';
            form.target = '_self';
            form.submit();
        }
    </script>
</body>

</html>
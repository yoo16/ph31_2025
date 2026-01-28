<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>チラシエディタ - Fabric.js & GD</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fabric.js CDN インストール -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fabric.js/5.3.1/fabric.min.js"></script>
</head>

<body class="bg-slate-100 text-slate-800">

    <div class="flex h-screen overflow-hidden">
        <aside class="w-80 bg-white shadow-xl z-10 p-6 flex flex-col gap-6">
            <div>
                <h1 class="text-xl font-bold text-indigo-600">Flyer Editor</h1>
                <p class="text-xs text-slate-400">キャンバス上で自由に配置してください</p>
            </div>

            <div class="space-y-3">
                <label class="text-sm font-semibold">素材を追加</label>
                <button onclick="addText()" class="w-full py-2 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 rounded-lg font-medium transition">
                    T テキスト追加
                </button>
                <input type="file" id="imageInput" class="hidden" accept="image/*" onchange="handleImage(event)">
                <button onclick="document.getElementById('imageInput').click()" class="w-full py-2 bg-slate-50 hover:bg-slate-100 text-slate-700 rounded-lg font-medium transition">
                    📷 画像追加
                </button>
            </div>

            <div id="textControls" class="space-y-4 p-4 bg-slate-50 rounded-xl border border-slate-200 hidden">
                <p class="text-xs font-bold text-slate-500 uppercase">テキスト設定</p>

                <div>
                    <label class="text-xs">サイズ</label>
                    <input type="range" id="fontSizeInput" min="10" max="200" value="40"
                        class="w-full h-2 bg-slate-200 rounded-lg appearance-none cursor-pointer">
                </div>

                <div>
                    <label class="text-xs">カラー</label>
                    <input type="color" id="colorInput" value="#333333"
                        class="w-full h-10 p-1 bg-white border border-slate-200 rounded-lg cursor-pointer">
                </div>
            </div>

            <div class="mt-auto space-y-2">
                <button onclick="submitToPhp('inline')" class="w-full py-3 bg-slate-700 hover:bg-slate-800 text-white font-bold rounded-xl transition">
                    プレビュー更新
                </button>
                <button onclick="submitToPhp('download')" class="w-full py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-xl shadow-lg transition">
                    PNGダウンロード
                </button>
            </div>
        </aside>

        <main class="flex-1 p-8 flex justify-center items-center overflow-auto">
            <div class="shadow-2xl bg-white border border-slate-300">
                <canvas id="mainCanvas" width="600" height="848"></canvas>
            </div>
        </main>
    </div>

    <form id="exportForm" action="output.php" method="POST" target="preview_frame" class="hidden">
        <input type="hidden" name="canvas_data" id="canvasDataInput">
        <input type="hidden" name="mode" id="outputMode">
    </form>

    <script src="js/app.js"></script>
</body>

</html>
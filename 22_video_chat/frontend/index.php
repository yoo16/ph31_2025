<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Video Chat</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-900 min-h-screen flex flex-col">
    <div class="flex-1 flex flex-col lg:flex-row overflow-hidden">

        <div class="flex-1 relative bg-black flex items-center justify-center group">

            <video id="remoteVideo" class="w-full h-full object-contain" autoplay playsinline></video>
            <div class="absolute top-4 left-4 bg-black/50 text-white px-3 py-1 rounded-full text-xs" id="status-remote">相手: 待機中</div>

            <div class="absolute bottom-20 right-4 w-32 md:w-48 aspect-video bg-gray-800 rounded-lg overflow-hidden shadow-2xl border-2 border-white/20 z-10">
                <video id="localVideo" class="w-full h-full object-cover mirror" autoplay playsinline muted></video>
                <div class="absolute bottom-1 left-1 bg-black/50 text-[10px] text-white px-1 rounded" id="status-local">自分</div>
            </div>

            <div class="absolute bottom-4 flex items-center space-x-4 z-20">
                <button id="startBtn" class="bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-full shadow-xl transition-transform hover:scale-105">
                    <span class="text-sm px-4">ビデオ通話</span>
                </button>
                <button id="videoToggleBtn" class="bg-green-600 hover:bg-green-700 text-white p-4 rounded-full shadow-xl transition-transform hover:scale-105">
                    <span class="text-sm px-4">カメラON</span>
                </button>
                <button id="audioBtn" class="bg-gray-600 hover:bg-gray-700 text-white p-4 rounded-full shadow-xl transition-transform hover:scale-105">
                    <span class="text-sm px-4">音声OFF</span>
                </button>
                <div id="conn-state" class="bg-black/60 text-white px-4 py-2 rounded-full text-xs font-mono backdrop-blur-md">
                    オフライン
                </div>
            </div>
        </div>

        <div class="w-full lg:w-80 bg-white flex flex-col border-l border-gray-700 shadow-2xl">
            <div class="flex-1 flex flex-col min-h-0">
                <div class="p-3 border-b font-bold text-gray-700 bg-gray-50">Text Chat</div>
                <div id="chat-messages" class="flex-1 p-4 overflow-y-auto space-y-2 text-sm"></div>
                <form id="chat-form" class="p-3 border-t bg-white flex flex-col gap-2">
                    <input type="text" id="chat-input" class="w-full border rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 outline-none" placeholder="メッセージを入力...">
                    <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded-lg text-sm hover:bg-black transition">送信</button>
                </form>
            </div>
            <div id="log-container" class="bg-gray-800 text-green-400 p-2 h-24 overflow-y-auto text-[10px] font-mono border-b border-gray-900">
                <div>[System] Ready...</div>
            </div>
        </div>
    </div>

    <style>
        /* 自分の映像を鏡合わせにする（使い勝手向上） */
        .mirror {
            transform: scaleX(-1);
        }
    </style>
    <script src="js/app.js"></script>
</body>

</html>
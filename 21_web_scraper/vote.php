<?php
$tokyo = ["51262" => "東京1区", "51263" => "東京2区", "51264" => "東京3区", "51265" => "東京4区", "51266" => "東京5区", "51267" => "東京6区", "51268" => "東京7区", "51269" => "東京8区", "51270" => "東京9区", "51271" => "東京10区", "51272" => "東京11区", "51273" => "東京12区", "51274" => "東京13区", "51275" => "東京14区", "51276" => "東京15区", "51277" => "東京16区", "51278" => "東京17区", "51279" => "東京18区", "51281" => "東京19区", "51285" => "東京20区", "51288" => "東京21区", "51291" => "東京22区", "51292" => "東京23区", "51307" => "東京24区", "51308" => "東京25区", "51312" => "東京26区", "51313" => "東京27区", "51314" => "東京28区", "51315" => "東京29区", "51316" => "東京30区"];
$kanagawa = ["51280" => "神奈川1区", "51282" => "神奈川2区", "51283" => "神奈川3区", "51284" => "神奈川4区", "51286" => "神奈川5区", "51287" => "神奈川6区", "51289" => "神奈川7区", "51290" => "神奈川8区", "51292" => "神奈川9区", "51293" => "神奈川10区", "51294" => "神奈川11区", "51295" => "神奈川12区", "51296" => "神奈川13区", "51297" => "神奈川14区", "51298" => "神奈川15区", "51299" => "神奈川16区", "51301" => "神奈川17区", "51302" => "神奈川18区", "51304" => "神奈川19区", "51305" => "神奈川20区"];
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>衆院選抽出 (東京・神奈川)</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/default.css">
</head>

<body class="bg-slate-50 min-h-screen font-sans text-slate-900">

    <div class="max-w-3xl mx-auto py-12 px-6">
        <div class="bg-white rounded-3xl shadow-xl shadow-slate-200/50 p-8 border border-slate-100 mb-8">
            <h1 class="text-2xl font-black mb-8 text-center tracking-tight text-slate-800">衆院選データ抽出 <span class="text-blue-600">東京・神奈川</span></h1>

            <form id="scrape-form" action="vote_scrape.php" method="POST" class="max-w-md mx-auto space-y-6">
                <div>
                    <label class="text-[10px] font-bold text-slate-400 uppercase tracking-widest ml-1">Election District</label>
                    <select name="senkyoku_id" required
                        class="w-full mt-1 bg-slate-50 border-2 border-slate-100 p-4 rounded-2xl focus:border-blue-600 focus:bg-white outline-none transition-all appearance-none cursor-pointer text-slate-700">
                        <option value="">選挙区を選択してください</option>

                        <optgroup label="東京都">
                            <?php foreach ($tokyo as $id => $name): ?>
                                <option value="<?= $id ?>"><?= $name ?></option>
                            <?php endforeach; ?>
                        </optgroup>

                        <optgroup label="神奈川県">
                            <?php foreach ($kanagawa as $id => $name): ?>
                                <option value="<?= $id ?>"><?= $name ?></option>
                            <?php endforeach; ?>
                        </optgroup>
                    </select>
                </div>
                <button type="submit" id="submit-btn" class="w-full h-[60px] bg-blue-600 hover:bg-slate-800 text-white font-bold px-10 rounded-2xl transition-all duration-300">
                    解析を実行
                </button>
            </form>
        </div>

        <?php
        $lastId = $_GET['last_id'] ?? null;
        $jsonPath = $lastId ? "data/{$lastId}.json" : null;
        if ($jsonPath && file_exists($jsonPath)):
            $candidates = json_decode(file_get_contents($jsonPath), true);
        ?>
            <div class="bg-white rounded-3xl shadow-xl border border-slate-100 overflow-hidden animate-in fade-in slide-in-from-bottom-4 duration-500">
                <div class="p-6 bg-slate-50 border-b flex justify-between items-center">
                    <p class="font-black text-slate-800 tracking-tight">取得結果: ID <?= htmlspecialchars($lastId) ?></p>
                    <a href="<?= $jsonPath ?>" download class="bg-emerald-500 hover:bg-emerald-600 text-white text-[10px] font-black px-4 py-2 rounded-lg transition-colors">JSON DOWNLOAD</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left">
                        <tbody class="divide-y divide-slate-100">
                            <?php foreach ($candidates as $c): ?>
                                <tr class="hover:bg-slate-50/50 transition-colors">
                                    <td class="px-8 py-5 font-bold text-slate-800"><?= htmlspecialchars($c['name']) ?></td>
                                    <td class="px-8 py-5">
                                        <span class="bg-blue-50 text-blue-600 text-[10px] font-black px-3 py-1 rounded-full italic">
                                            <?= htmlspecialchars($c['party']) ?>
                                        </span>
                                    </td>
                                    <td class="px-8 py-5 text-sm text-slate-500 italic"><?= htmlspecialchars($c['age']) ?> | <?= htmlspecialchars($c['job']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        <?php endif; ?>
    </div>

    <div id="loading-overlay" class="fixed inset-0 bg-slate-900/40 backdrop-blur-md hidden flex items-center justify-center z-50">
        <div class="bg-white p-12 rounded-[40px] shadow-2xl flex flex-col items-center">
            <div class="loader mb-6"></div>
            <p class="font-black text-lg text-slate-800 tracking-tighter">データを抽出しています...</p>
        </div>
    </div>

    <script>
        document.getElementById('scrape-form').addEventListener('submit', () => {
            document.getElementById('submit-btn').disabled = true;
            document.getElementById('loading-overlay').classList.remove('hidden');
        });
    </script>
</body>

</html>
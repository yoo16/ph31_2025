<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>99</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <main class="container mx-auto p-6">
        <h1 class="text-3xl text-center font-bold mb-6">99</h1>

        <div class="grid grid-cols-10 gap-px max-w-xl mx-auto bg-gray-400 text-center text-sm">
            <!-- 1行目：見出し -->
            <div class="bg-white font-bold p-2">×</div>
            <?php foreach (range(1, 9) as $y) : ?>
                <!-- TODO: $y -->
                <div class="bg-gray-200 font-bold p-2"></div>
            <?php endforeach; ?>

            <?php foreach (range(1, 9) as $x) : ?>
                <!-- TODO: $x -->
                <div class="bg-gray-200 font-bold p-2"></div>
                <?php foreach (range(1, 9) as $y) : ?>
                    <div class="bg-white p-2 hover:bg-yellow-100 transition">
                        <!-- TODO: $x * $y -->
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </main>
</body>

</html>
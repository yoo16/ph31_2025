<?php
// Composer のオートローダーを読み込む
require_once __DIR__ . '/../vendor/autoload.php';

// 環境変数を読み込むための Dotenv ライブラリを使用
use Dotenv\Dotenv;

// .env ファイルから環境変数を読み込む
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// 環境変数を定数として定義
define('API_KEY', $_ENV['API_KEY']);
define('DB_HOST', $_ENV['DB_HOST']);
define('DB_USER', $_ENV['DB_USER']);
define('DB_PASSWORD', $_ENV['DB_PASSWORD']);
define('DB_NAME', $_ENV['DB_NAME']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Load Env</title>
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Environment Variable Example</h1>
        <section class="mt-6 bg-gray-100 p-4 rounded">
            <h2 class="text-xl mb-2">API Information</h2>
            <div class="mb-2">
                <span class="font-bold">API Key:</span>
                <span class=""><?= API_KEY ?></span>
            </div>
        </section>
        <section class="mt-6 bg-gray-100 p-4 rounded">
            <h2 class="text-xl mb-2">Database Information</h2>
            <div class="mb-2">
                <span class="font-bold">DB Host:</span>
                <span class=""><?= DB_HOST ?></span>
            </div>
            <div class="mb-2">
                <span class="font-bold">Name:</span>
                <span class=""><?= DB_NAME ?></span>
            </div>
            <div class="mb-2">
                <span class="font-bold">User:</span>
                <span class=""><?= DB_USER ?></span>
            </div>
            <div class="mb-2">
                <span class="font-bold">Password:</span>
                <span class=""><?= DB_PASSWORD ?></span>
            </div>
        </section>
    </main>
</body>

</html>
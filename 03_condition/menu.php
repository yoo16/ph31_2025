<?php
$isAuth = false;
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <!-- TailwindCSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <nav>
        <ul class="flex gap-4 p-4 bg-orange-500 text-white">
            <li><a href="">Home</a></li>
            <li><a href="">About</a></li>
            <li><a href="">Contact</a></li>
            <li><a href="">Products</a></li>
            <!-- TODO: endif で分岐 -->
            <li><a href="">My Page</a></li>
            <li><a href="">Logout</a></li>
            <li><a href="">Sign in</a></li>
        </ul>
    </nav>
</body>

</html>
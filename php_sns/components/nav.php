<?php

use App\Models\User;
?>
<nav id="side-menu" class="p-3">
    <ul>
        <li class="py-1">
            <a href="home/" class="inline-flex items-center">
                <img src="svg/home.svg" class="w-8 mr-2">
                <span class="hidden md:inline">ホーム</span>
            </a>
        </li>
        <li class="py-1">
            <a href="home/garally/" class="inline-flex items-center">
                <img src="svg/camera.svg" class="w-8 mr-2">
                <span class="hidden md:inline">メディア</span>
            </a>
        </li>
        <li class="py-1">
            <div id="user-menu" class="inline-flex items-center">
                <img src="<?= User::profileImage($auth_user['profile_image']) ?>" class="rounded-full w-10 h-10 object-cover mr-2 cursor-pointer" id="user-icon">
            </div>
            <!-- ポップアップ（初期状態は非表示） -->
            <div id="user-popup" class="hidden absolute left-0 m-2 w-64 bg-white border border-gray-300 rounded shadow-lg z-10">
                <a href="user/" class="font-bold block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    プロフィール
                </a>
                <a href="user/logout/" class="font-bold block px-4 py-2 text-gray-700 hover:bg-gray-100">
                    <span class="">@<?= $auth_user['account_name'] ?></span>
                    からログアウト
                </a>
            </div>
        </li>
    </ul>
</nav>
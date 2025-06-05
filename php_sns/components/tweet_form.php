<?php
use App\Models\User;
?>
<div class="border-b">
    <!-- TODO: form タグの設定:  -->
    <!-- 1. URL: action=home/add/ -->
    <!-- 2. POSTメソッド: method=post -->
    <!-- 3. ファイルアップロード用: enctype=multipart/form-data -->
    <form action="" method="" enctype="" class="p-3" >
        <div class="px-1">
            <a href="user/">
                <img id="preview-image" src="<?= User::profileImage($auth_user['profile_image']) ?>" class="w-8 h-8 object-cover rounded-full mb-4">
            </a>
        </div>
        <textarea required name="message" class="w-full border-0 p-3" placeholder="いまどうしてる？"></textarea>

        <!-- 画像プレビュー用コンテナ -->
        <div id="imagePreviewContainer" class="mt-2"></div>

        <!-- 隠した file input -->
        <input type="file" name="file" id="fileInput" accept="image/*" style="display: none;" />

        <nav class="px-5 flex justify-between items-center">
            <!-- SVG アイコンを表示する label -->
            <div>
                <label for="fileInput" class="cursor-pointer inline-block mt-2">
                    <img src="svg/image.svg" class="w-6" alt="">
                </label>
            </div>
            <!-- ポストボタン -->
            <div>
                <!-- ここでは幅を自動に変更 -->
                <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded-full w-auto">
                    ポストする
                </button>
            </div>
        </nav>
    </form>
</div>
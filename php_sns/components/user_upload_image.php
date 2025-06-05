<?php

use App\Models\User;
?>
<div class="flex justify-center items-center">
    <div class="bg-white p-8 rounded-lg">
        <form action="user/upload_profile_image/" method="post" enctype="multipart/form-data" class="flex flex-col items-center">
            <label for="image-input" class="cursor-pointer">
                <img id="preview-image" src="<?= User::profileImage($auth_user['profile_image']) ?>" alt="Profile Picture" class="w-32 h-32 object-cover rounded-full mb-4">
            </label>
            <input onchange="selectProfileImage(this)" type="file" id="image-input" name="file" class="hidden" accept="image/*" required>
            <label class="text-xs" for="image-input">画像を選択</label>
            <button id="upload-button"
                class="w-full text-sm my-2 py-1 px-3 bg-sky-500 hover:bg-sky-700 text-white rounded-lg hidden">
                アップロード
            </button>
        </form>
    </div>
</div>
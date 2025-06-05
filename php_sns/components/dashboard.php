<?php

use App\Models\User;
?>

<div class="px-6">
    <div class="py-6 flex justify-center cursor-pointer">
        <img id="preview-image" src="<?= User::profileImage($user_data['profile_image']) ?>" class="w-32 h-32 object-cover rounded-full mb-4">
    </div>
    <div class="text-center">
        <?php if ($auth_user['id'] == $user_data['id']): ?>
            <a href="user/edit/" class="border border-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg">プロフィールを編集</a>
        <?php endif ?>
    </div>

    <div>
        <h2 class="text-2xl font-bold py-2"><?= $user_data['display_name'] ?></h2>
        <div class="text-gray-600 mb-2">
            <span>@<?= $user_data['account_name'] ?></span>
        </div>
        <div class="text-gray-600 text-sm mb-4">
            <?= nl2br($user_data['profile'] ?? "") ?>
        </div>
        <div class="text-gray-600 text-sm mb-4">
            <?= date('Y.m.d', strtotime($user_data['created_at'])) ?> から利用しています
        </div>
    </div>

    <div>
        <div class="flex justify-start gap-4 text-sm">
            <div class="text-center">
                <span class="font-bold text-lg"><?= $tweet_count ?? 0 ?></span>
                <span class="text-gray-600 text-sm">ツイート</span>
            </div>
            <div class="text-center">
                <span class="font-bold text-lg"><?= $follow_count ?? 0 ?></span>
                <span class="text-gray-600 text-sm">フォロー中</span>
            </div>
            <div class="text-center">
                <span class="font-bold text-lg"><?= $follower_count ?? 0 ?></span>
                <span class="text-gray-600 text-sm">フォロワー</span>
            </div>
        </div>
    </div>
</div>
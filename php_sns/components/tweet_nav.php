<nav class="mt-3">
    <ul class="flex justify-start space-x-6">
        <li class="cursor-pointer">
            <div class="replay-count inline-flex items-center space-x-2">
                <img src="svg/bubble.svg" class="w-4" alt="コメント">
                <span class="text-gray-600 text-xs">0</span>
            </div>
        </li>
        <li class="cursor-pointer">
            <form action="home/like/" method="post" class="inline-flex items-center space-x-2">
                <button type="submit" class="inline-flex items-center space-x-2">
                    <img src="svg/heart.svg" class="w-4" alt="いいね">
                    <span class="text-gray-600 text-xs"><?= $value['like_count'] ?></span>
                </button>
                <input type="hidden" name="tweet_id" value="<?= $value['id'] ?>">
                <input type="hidden" name="user_id" value="<?= $auth_user['id'] ?>">
            </form>
        </li>
        <li class="cursor-pointer">
            <div class="retweet-count inline-flex items-center space-x-2">
                <img src="svg/loop.svg" class="w-4" alt="リツイート">
                <span class="text-gray-600 text-xs">0</span>
            </div>
        </li>
        <?php if ($auth_user['id'] == $value['user_id']): ?>
            <li class="cursor-pointer">
                <form action="home/delete/" method="post" class="inline-flex items-center space-x-2">
                    <div onclick="deleteTweet(this)" class="inline-flex items-center space-x-2">
                        <img src="svg/trash.svg" class="w-4" alt="削除">
                    </div>
                    <input type="hidden" name="tweet_id" value="<?= $value['id'] ?>">
                    <input type="hidden" name="user_id" value="<?= $auth_user['id'] ?>">
                </form>
            </li>
        <?php endif ?>
    </ul>
</nav>
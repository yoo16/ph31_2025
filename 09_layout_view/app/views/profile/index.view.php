<section class="max-w-md mx-auto p-6 rounded-lg">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Profile</h2>

    <div class="space-y-4 text-gray-700">
        <!-- プロフィール画像 -->
        <div class="flex justify-center">
            <img
                src="<?= htmlspecialchars($user->profile_image) ?>"
                alt="Profile Image"
                class="w-32 h-32 rounded-full object-cover shadow">
        </div>

        <!-- 名前 -->
        <div>
            <span class="block text-sm font-semibold text-gray-500">Name</span>
            <span class="text-lg"><?= htmlspecialchars($user->name) ?></span>
        </div>

        <!-- 年齢 -->
        <div>
            <span class="block text-sm font-semibold text-gray-500">Age</span>
            <span class="text-lg"><?= htmlspecialchars($user->age) ?></span>
        </div>

        <!-- 自己紹介 -->
        <div>
            <span class="block text-sm font-semibold text-gray-500">Introduction</span>
            <p class="text-base leading-relaxed"><?= nl2br(htmlspecialchars($user->introduction)) ?></p>
        </div>
    </div>
</section>
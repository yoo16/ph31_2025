<form action="user/update/" method="post">
    <div class="relative mb-4">
        <input type="text" name="account_name"
            id="account_name"
            class="block px-2.5 pb-2.5 pt-6 mb-3 w-full rounded-lg text-sm text-gray-900 ring-1 ring-gray-300"
            value="<?= $auth_user['account_name'] ?>"
            placeholder=" " disabled>
        <label for="email" class="absolute text-sm text-gray-400 transform -translate-y-4 scale-75 top-4 origin-[0] start-2.5">アカウント名</label>
    </div>
    <div class="relative mb-4">
        <input type="text" name="account_name"
            id="email"
            class="block px-2.5 pb-2.5 pt-6 mb-3 w-full rounded-lg text-sm text-gray-900 ring-1 ring-gray-300"
            value="<?= $auth_user['email'] ?>"
            placeholder=" " disabled>
        <label for="email" class="absolute text-sm text-gray-400 transform -translate-y-4 scale-75 top-4 origin-[0] start-2.5">Email</label>
    </div>

    <div class="relative mb-4">
        <input type="text" name="display_name"
            id="display_name"
            class="block px-2.5 pb-2.5 pt-6 mb-3 w-full rounded-lg text-sm 
                                    text-gray-900 ring-1 ring-gray-300 focus:outline-none focus:ring-1 focus:ring-blue-600 peer" value="<?= $auth_user['display_name'] ?>" placeholder=" " required>
        <label for="name" class="absolute 
                        text-sm text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 origin-[0] start-2.5 
                        peer-focus:px-0
                        peer-focus:text-blue-600 
                        peer-focus:dark:text-blue-500 
                        peer-placeholder-shown:scale-100 
                        peer-placeholder-shown:translate-y-0 
                        peer-focus:scale-75 
                        peer-focus:-translate-y-4">
            ディスプレイ名
        </label>
    </div>


    <div class="relative mb-4">
        <textarea id="profile" oninput="autoResize(this)" name="profile"
            class="block px-2.5 pb-2.5 pt-6 mb-3 w-full rounded-lg text-sm text-gray-900 ring-1 ring-gray-300 
                                    focus:outline-none focus:ring-1 focus:ring-blue-600 peer"
            placeholder=" "><?= @$auth_user['profile'] ?></textarea>
        <label for="profile"
            class="absolute text-sm text-gray-400 duration-300 transform -translate-y-4 scale-75 top-4 origin-[0] start-2.5 
                                    peer-focus:px-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">
            自己紹介
        </label>
    </div>

    <div>
        <button id="submit_button" class="w-full mb-2 py-2 px-4 bg-sky-500 hover:bg-sky-700 text-white rounded-lg">
            保存
        </button>
    </div>
</form>
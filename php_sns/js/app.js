// ユーザメニューとポップアップの取得
const userMenu = document.getElementById('user-menu');
const userPopup = document.getElementById('user-popup');

// ユーザメニューのクリックでポップアップの表示／非表示を切り替え
userMenu?.addEventListener('click', (e) => {
    e.stopPropagation(); // クリックイベントのバブリングを防ぐ
    userPopup.classList.toggle('hidden');
});

// ページ内の他の箇所がクリックされた場合はポップアップを非表示にする
document.addEventListener('click', () => {
    if (!userPopup) return;
    if (!userPopup.classList.contains('hidden')) {
        userPopup.classList.add('hidden');
    }
});

function inputTestRegistUser() {
    document.getElementById('account_name').value = 'user1';
    document.getElementById('display_name').value = 'Test User1';
    document.getElementById('email').value = 'user1@test.com';
    document.getElementById('password').value = '1111';
}

function inputTestLoginUser() {
    document.getElementById('account_name').value = 'user1';
    document.getElementById('password').value = '1111';
}

function updateLike(target) {
    target.closest('form').submit()
}

function deleteTweet(target) {
    if (!confirm('削除しますか？')) {
        return;
    }
    target.closest('form').submit()
}

// ハッシュタグ
document.addEventListener("DOMContentLoaded", function () {
    // ハッシュタグリンク化
    document.querySelectorAll(".tweet-message").forEach(el => {
        const text = el.innerHTML;
        // ハッシュタグ検出（日本語 + アルファベット + 数字 + _ に対応）
        const linked = text.replace(/#([一-龯ぁ-んァ-ンー\w]+)/gu, function (match, tag) {
            console.log(tag);
            const url = `home/search/?keyword=%23${encodeURIComponent(tag)}`;
            return `<a href="${url}" class="text-blue-500 hover:underline">${match}</a>`;
        });
        el.innerHTML = linked;

        // 本文クリックで投稿詳細へ（ハッシュタグクリックは除外）
        el.addEventListener("click", function (e) {
            if (e.target.tagName.toLowerCase() !== 'a') {
                const tweetId = el.dataset.id;
                window.location.href = `home/detail/?id=${tweetId}`;
            }
        });
    });
});
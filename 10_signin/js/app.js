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

function inputTestLoginUser() {
    document.getElementById('email').value = 'user1@test.com';
    document.getElementById('password').value = '1111';
}
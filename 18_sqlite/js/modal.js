function openModal(imageUrl, title, body) {
    // TODO: 画像URLから画像を取得して表示
    document.getElementById("modalImage").src;
    // TODO: タイトルと本文を設定
    document.getElementById("modalTitle").innerText;
    document.getElementById("modalBody").innerHTML;
    // モーダルを表示
    document.getElementById("imageModal").classList.remove("hidden");
    // モーダルをフレックスボックスに設定して中央に配置
    document.getElementById("imageModal").classList.add("flex");
}

function closeModal() {
    // モーダルを非表示
    document.getElementById("imageModal").classList.add("hidden");
    // フレックスボックスの設定を解除
    document.getElementById("imageModal").classList.remove("flex");
}

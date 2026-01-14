function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function (e) {
            const base64Data = e.target.result;
            // プレビューの背景を更新
            document.querySelector('.card').style.backgroundImage = `url('${base64Data}')`;
            // PDF生成用の隠しフィールドにセット
            document.getElementById('bg_base64').value = base64Data;
        }
        reader.readAsDataURL(input.files[0]);
    }
}

function update() {
    const name = document.getElementById('in_name').value;
    const title = document.getElementById('in_title').value;
    const email = document.getElementById('in_email').value;
    const web = document.getElementById('in_web').value;
    const tel = document.getElementById('in_tel').value;

    const name_color = document.getElementById('in_color_name').value;
    const title_color = document.getElementById('in_color_title').value;
    const info_color = document.getElementById('in_color_info').value;

    const bgZoom = document.getElementById('in_bg_zoom').value;
    const bgX = document.getElementById('in_bg_x').value;
    const bgY = document.getElementById('in_bg_y').value;

    // テキスト反映
    document.querySelector('.name').innerText = name;
    document.querySelector('.title').innerText = title;
    document.querySelector('.info').innerHTML = `Email: ${email}<br>Web: ${web}<br>Tel: ${tel}`;

    // 色反映
    document.querySelector('.name').style.color = name_color;
    document.querySelector('.title').style.color = title_color;
    document.querySelector('.info').style.color = info_color;

    // 画像反映
    document.querySelector('.card').style.backgroundSize = `${bgZoom}%`;
    document.querySelector('.card').style.backgroundPosition = `${bgX}% ${bgY}%`;
}

// 読み込み後処理
document.addEventListener('DOMContentLoaded', update);
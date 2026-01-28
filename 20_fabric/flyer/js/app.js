// キャンバスの初期化
const canvas = new fabric.Canvas('mainCanvas');

// UI要素
const fontSizeInput = document.getElementById('fontSizeInput');
const colorInput = document.getElementById('colorInput');
const textControls = document.getElementById('textControls');
const form = document.getElementById('exportForm');

// テキスト追加関数
function addText() {
    // TODO: Fabric.js を使ってテキストを追加
    const text = new fabric.IText('ここに入力', {
        left: 100,
        top: 100,
        fontFamily: 'sans-serif',
        fontSize: 40,
        fill: '#333333'
    });
    canvas.add(text);
    canvas.setActiveObject(text);
}

// 画像追加のハンドリング
function handleImage(e) {
    // 画像ファイルを読み込む
    const reader = new FileReader();
    reader.onload = function (event) {
        // TODO: Fabric.js を使って画像をキャンバスに追加
        fabric.Image.fromURL(event.target.result, function (img) {
            img.scaleToWidth(300);
            canvas.add(img);
            canvas.centerObject(img);
        });
    };
    reader.readAsDataURL(e.target.files[0]);
}

// PHPへJSONデータを送信する関数
function submitToPhp(mode) {
    // キャンバス上の全データをJSON化
    const json = JSON.stringify(canvas.toJSON());

    // JSONデータを設定: input type=hidden
    document.getElementById('canvasDataInput').value = json;
    // ダウンロードモード: input type=hidden
    document.getElementById('outputMode').value = mode;


    if (mode === 'inline') {
        // プレビューの場合は別タブ（またはiframe）で開く
        form.target = '_blank';
    } else {
        // ダウンロードの場合は現在のウィンドウ
        form.target = '_self';
    }

    // PHPに送信: output.php
    form.submit();
}

// デリートキーで選択中の要素を削除
window.addEventListener('keydown', (e) => {
    if (e.key === 'Delete' || e.key === 'Backspace') {
        if (canvas.getActiveObject() && !canvas.getActiveObject().isEditing) {
            canvas.remove(canvas.getActiveObject());
        }
    }
});



// オブジェクトが選択されたときのイベント
canvas.on('selection:created', handleSelection);
canvas.on('selection:updated', handleSelection);
canvas.on('selection:cleared', () => textControls.classList.add('hidden'));

//  Fabric.js を使ってテキストを編集
function handleSelection(e) {
    const obj = e.selected[0];
    if (obj.type === 'i-text' || obj.type === 'text') {
        textControls.classList.remove('hidden');
        fontSizeInput.value = obj.fontSize;
        colorInput.value = obj.fill;
    } else {
        textControls.classList.add('hidden');
    }
}

// フォントサイズの変更
fontSizeInput.addEventListener('input', () => {
    // canvas から選択されているオブジェクトを取得
    const obj = canvas.getActiveObject();
    if (obj) {
        obj.set('fontSize', parseInt(fontSizeInput.value));
        // 再レンダリング
        canvas.renderAll();
    }
});

// カラーの変更
colorInput.addEventListener('input', () => {
    // canvas から選択されているオブジェクトを取得
    const obj = canvas.getActiveObject();
    if (obj) {
        obj.set('fill', colorInput.value);
        // 再レンダリング
        canvas.renderAll();
    }
});
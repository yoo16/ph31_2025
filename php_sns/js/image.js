selectProfileImage = (event) => {
    const previewImage = document.getElementById('preview-image');
    const file = event.files[0];
    previewImage.src = URL.createObjectURL(file);
    document.getElementById('upload-button').classList.remove('hidden');
}

// グローバル変数として元画像の Data URL を保持（後でフィルター処理に使用）
let originalDataUrl = null;

const fileInput = document.getElementById('fileInput');
if (fileInput) {
    fileInput.addEventListener('change', (event) => {
        const previewContainer = document.getElementById('imagePreviewContainer');
        // 選択されたファイルを取得
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => {
                // プレビュー領域をクリア
                previewContainer.innerHTML = '';

                // 元の画像データを保存
                originalDataUrl = e.target.result;

                // プレビュー用ラッパーを生成（relative で削除ボタン配置用）
                const wrapper = document.createElement('div');
                wrapper.classList.add('relative', 'inline-block', 'mt-2', 'rounded-lg');

                // 元画像表示用 img 要素生成
                const img = document.createElement('img');
                img.src = originalDataUrl;
                img.classList.add('max-w-[400px]', 'rounded-lg', 'shadow-md');

                // 削除ボタンの生成（画像の右上に配置）
                const deleteBtn = document.createElement('button');
                deleteBtn.innerHTML = '&times;';
                deleteBtn.classList.add(
                    'absolute',
                    'top-1',
                    'right-1',
                    'bg-gray-800',
                    'text-white',
                    'rounded-full',
                    'w-8',
                    'h-8',
                    'flex',
                    'items-center',
                    'justify-center',
                    'cursor-pointer'
                );
                deleteBtn.addEventListener('click', () => {
                    previewContainer.innerHTML = '';
                    fileInput.value = '';
                    originalDataUrl = null;
                });

                // ラッパーに画像と削除ボタンを追加
                wrapper.appendChild(img);
                wrapper.appendChild(deleteBtn);
                previewContainer.appendChild(wrapper);
            };

            reader.readAsDataURL(file);
        }
    });
}

// 加工済み画像を生成してプレビュー領域に表示する共通処理
function applyFilter(filterValue) {
    // 画像が選択されているか確認
    if (!originalDataUrl) return;

    const previewContainer = document.getElementById('imagePreviewContainer');

    // 新たに Image オブジェクトを作成（元画像を利用）
    const img = new Image();
    img.src = originalDataUrl;
    img.onload = () => {
        // 元画像と同じサイズの Canvas を生成
        const canvas = document.createElement('canvas');
        canvas.width = img.width;
        canvas.height = img.height;
        const ctx = canvas.getContext('2d');

        // 指定されたフィルターを適用
        ctx.filter = filterValue;
        ctx.drawImage(img, 0, 0);

        // 加工済み画像の Data URL を取得
        const processedDataUrl = canvas.toDataURL();

        // プレビュー領域をクリアして、新しい画像を表示
        previewContainer.innerHTML = '';
        const wrapper = document.createElement('div');
        wrapper.classList.add('relative', 'inline-block', 'mt-2', 'rounded-lg');

        const processedImg = document.createElement('img');
        processedImg.src = processedDataUrl;
        processedImg.classList.add('max-w-[400px]', 'rounded-lg', 'shadow-md');

        // 削除ボタン（画像の右上）
        const deleteBtn = document.createElement('button');
        deleteBtn.innerHTML = '&times;';
        deleteBtn.classList.add(
            'absolute',
            'top-1',
            'right-1',
            'bg-gray-800',
            'text-white',
            'rounded-full',
            'w-8',
            'h-8',
            'flex',
            'items-center',
            'justify-center',
            'cursor-pointer'
        );
        deleteBtn.addEventListener('click', () => {
            previewContainer.innerHTML = '';
            fileInput.value = '';
            originalDataUrl = null;
        });

        wrapper.appendChild(processedImg);
        wrapper.appendChild(deleteBtn);
        previewContainer.appendChild(wrapper);
    };
}
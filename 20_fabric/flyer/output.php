<?php
ini_set('display_errors', 0);
// 1. config.phpを読み込む
require_once 'config.php';

// 2. データの取得
$jsonData = $_POST['canvas_data'] ?? '';
$mode = $_POST['mode'] ?? 'inline';
$data = json_decode($jsonData, true);

if (!$data) {
    die("データが空です。キャンバスに要素を追加してください。");
}

// 3. キャンバスの作成
$width = $data['width'] ?? 600;
$height = $data['height'] ?? 848;
$image = imagecreatetruecolor($width, $height);

// 背景を白に
$white = imagecolorallocate($image, 255, 255, 255);
imagefill($image, 0, 0, $white);

// 4. オブジェクトの描画
foreach ($data['objects'] as $obj) {
    if ($obj['type'] === 'i-text' || $obj['type'] === 'text') {
        drawText($image, $obj, $config);
    } elseif ($obj['type'] === 'image') {
        drawImage($image, $obj);
    }
}

// 5. 出力
if ($mode === 'download') {
    header('Content-Type: image/png');
    header('Content-Disposition: attachment; filename="flyer.png"');
} else {
    header('Content-Type: image/png');
}

imagepng($image);
imagedestroy($image);

// --- 描画補助関数 ---

function drawText($image, $obj, $config)
{
    // どのウェイトを使うか判定 (FabricのfontWeightをconfigのキーに変換)
    $weightKey = ($obj['fontWeight'] === 'bold') ? 'B' : 'R';
    if ($obj['fontStyle'] === 'italic') $weightKey = 'I';

    // config.php からパスを組み立てる
    $fontFamily = $config['default_font']; // 今回は固定
    $fontFile   = $config['font'][$fontFamily][$weightKey];
    $fontPath   = $config['font_dir'] . '/' . $fontFile;

    // フォント存在チェック（デバッグ用ログ出力）
    if (!file_exists($fontPath)) {
        error_log("Font not found: " . $fontPath);
        return;
    }

    // px -> pt 換算の目安
    $size  = $obj['fontSize'] * 0.75;
    // Fabricは時計回り、GDは反時計回り
    $angle = -$obj['angle'];
    $x = $obj['left'];
    // Fabricの座標はテキストの上端、GDはベースラインなので調整
    $y = $obj['top'] + $size;

    // カラー処理: fabric.js の fill 値を GD 用の色情報に変換
    list($r, $g, $b) = sscanf($obj['fill'], "#%02x%02x%02x");
    // GD 用の色情報に変換
    $color = imagecolorallocate($image, $r, $g, $b);

    // GD でテキストを描画
    imagettftext($image, $size, $angle, $x, $y, $color, $fontPath, $obj['text']);
}

function drawImage($image, $obj)
{
    $src = $obj['src'];
    // データURL(Base64)か通常のURLか判別して読み込み
    $imgData = file_get_contents($src);
    if (!$imgData) return;

    $source = imagecreatefromstring($imgData);
    if ($source) {
        $sw = imagesx($source);
        $sh = imagesy($source);

        // 拡大縮小の計算
        $dw = $sw * $obj['scaleX'];
        $dh = $sh * $obj['scaleY'];

        // 画像の回転が必要な場合は imagerotate が必要ですが、一旦シンプルにコピー
        imagecopyresampled($image, $source, $obj['left'], $obj['top'], 0, 0, $dw, $dh, $sw, $sh);
        imagedestroy($source);
    }
}

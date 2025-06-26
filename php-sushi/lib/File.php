<?php
class File
{
    public static function localDir($path)
    {
        // ローカルパスを指定
        $dir = BASE_DIR . '/' . $path;
        return $dir;
    }

    public static function has($path)
    {
        $localDir = self::localDir($path);
        return file_exists($localDir);
    }

    public static function checkUploadDir($uploadDir)
    {
        // ディレクトリが存在しない場合は作成
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        // ディレクトリのパーミッションを設定
        chmod($uploadDir, 0777);
        return $uploadDir;
    }

    public static function upload($uploadDir, $fileName = '', $key = 'file')
    {
        // 画像がアップロードされているか確認
        if (isset($_FILES[$key]) && $_FILES[$key]['error'] === UPLOAD_ERR_OK) {
            // アップロードされたファイルの情報を取得
            $tmpPath = $_FILES[$key]['tmp_name'];
            // 画像ファイル名を指定
            if (!$fileName) {
                // 画像の拡張子を取得
                $extension = pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
                $fileName = uniqid() . '.' . $extension;
            }
            // アップロード先のディレクトリを指定
            $localDir = self::localDir($uploadDir);
            // アップロード先のディレクトリを確認
            self::checkUploadDir($localDir);
            // アップロード先のパスを指定
            $uploadPath = $localDir . $fileName;
            // ファイルを指定したディレクトリに移動
            if (move_uploaded_file($tmpPath, $uploadPath)) {
                // URLパス
                $imagePath = $uploadDir . $fileName;
                return $imagePath;
            }
        }
        return null;
    }
}

<?php

namespace App;

use Mpdf\Mpdf;

class PdfGenerator
{
    private $config;

    public function __construct($config = [])
    {
        $this->config = $config;
    }

    public function generate($data)
    {
        // 1. データの準備
        foreach ($data as $key => $value) {
            $data[$key] = $value ?? '';
        }

        // CSS の読み込み
        $css = file_get_contents($this->config['css']);
        // Content
        $content = $this->render($this->config['template'], $data);
        // Layout
        $html = $this->render($this->config['layout'], ['content' => $content]);
        $html = trim($html);

        // TODO: mPDFの初期化
        // 1. new Mpdf() で mPDFの初期化 
        // 2. $config['mpdf'] の設定
        $mpdf = new Mpdf($this->config['mpdf']);
        // 強制設定：はみ出しによる自動改ページを無効化: autoPageBreak = false
        $mpdf->autoPageBreak = false;

        // TODO: CSSを先に書き込む: writeHTML() モード 1
        // TODO: HTMLを後で書き込む: writeHTML() モード 2

        // 出力直前にバッファの中身（警告文など）を完全に捨てる
        if (ob_get_length()) ob_end_clean();

        // ダウンロードファイル名
        $fileName = $this->config['default_filename'];
        // TODO: PDFを出力: Output() ダウンロードモード: D
        exit;
    }

    // レンダリング関数
    private function render($path, $data)
    {
        extract($data);
        ob_start();
        include $path;
        return ob_get_clean() ?: '';
    }
}

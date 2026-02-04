<?php
require 'vendor/autoload.php';

// GuzzleとDomCrawlerをインポート
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

// POSTリクエスト以外は無視
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: suumo.php');
    exit;
}

// 選択された区を取得（デフォルトは新宿）
if (empty($_POST['area'])) {
    header('Location: suumo.php');
    exit;
}

// 保存用ディレクトリの作成
$dir = 'data';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

// Guzzleクライアントの初期化
$client = new Client();

try {
    // 対象の区を取得
    $area = $_POST['area'];

    // 対象のURLを取得
    $url = "https://suumo.jp/chintai/tokyo/{$area}/";

    // リクエストの送信
    // User-Agentを偽装しないとアクセス拒否される場合がある
    $response = $client->request('GET', $url, [
        'headers' => [
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
        ]
    ]);

    // HTMLを取得
    $html = $response->getBody()->getContents();

    // HTMLをパース
    $crawler = new Crawler($html);
    $properties = [];

    // 物件情報を抽出
    $crawler->filter('.cassetteitem')->each(function (Crawler $node) use (&$properties) {
        // TODO: 対象の区を取得
        // $area_code = $_POST['area'];

        // TODO: 物件名
        // $title = $node->filter('.cassetteitem_content-title')->text();
        // $title = trim($title);

        // TODO: 住所
        // $address = $node->filter('.cassetteitem_detail-col1')->text();
        // $address = trim($address);

        // TODO: 配列に追加
        $properties[] = [
            // 'area_code' => $area_code,
            // 'title'     => $title,
            // 'address'   => $address,
            // 'scraped_at' => date('Y-m-d H:i:s')
        ];
    });

    // JSONファイルに保存
    $fileName = "data/properties_{$area}.json";

    // TODO: JSON形式に変換
    // $jsonContent = json_encode($properties, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    // TODO: ファイルに書き込み
    // file_put_contents($fileName, $jsonContent);

    // 完了時にエリア名をクエリパラメータで渡す
    header("Location: suumo.php?status=success&area={$area}");
} catch (\Exception $e) {
    echo "エラー: " . $e->getMessage();
}

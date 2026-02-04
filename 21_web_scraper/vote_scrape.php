<?php
require 'vendor/autoload.php';

// GuzzleとDomCrawlerをインポート
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

// POST以外のアクセスは vote.php にリダイレクト
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || empty($_POST['senkyoku_id'])) {
    header('Location: vote.php');
    exit;
}

// 保存用ディレクトリの作成
$dir = 'data';
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}

// Guzzleクライアントの初期化
$client = new Client([
    'timeout' => 10.0,
    'headers' => [
        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
    ]
]);

try {
    // POSTされた選挙区IDを取得
    $senkyoku_id = preg_replace('/[^0-9]/', '', $_POST['senkyoku_id']);
    // 衆議院の選挙区のURLを生成
    $url = "https://shugiin.go2senkyo.com/51/senkyoku/{$senkyoku_id}/";

    // リクエストの送信
    $response = $client->request('GET', $url);
    // TODO: HTMLを取得
    // $html = $response->getBody()->getContents();

    // TODO: HTMLをパース
    // $crawler = new Crawler($html);

    // 候補者情報を抽出
    $data = $crawler->filter('.p_senkyoku_list_block')->each(function (Crawler $node) {
        // TODO: filter()で class="p_senkyoku_list_block_text_name .text" の要素を取得
        // $nameNode = $node->filter('.p_senkyoku_list_block_text_name .text');

        // TODO: filter()で class="p_senkyoku_list_block_text_party" の要素を取得
        // $partyNode = $node->filter('.p_senkyoku_list_block_text_party');

        // TODO: filter()で class="p_senkyoku_list_block_text_para span" の要素を取得
        // $params = $node->filter('.p_senkyoku_list_block_text_para span')->each(function (Crawler $s) {
        //     return trim($s->text());
        // });

        // 候補者情報を抽出
        // $name = trim(str_replace(' ', '', $nameNode->count() ? $nameNode->text() : '不明'));
        // $party = trim($partyNode->count() ? $partyNode->text() : '無所属等');
        // $age = $params[0] ?? '-';
        // $job = $params[1] ?? '-';

        // 配列に追加
        return [
            // 'name'  => $name,
            // 'party' => $party,
            // 'age'   => $age,
            // 'job'   => $job,
        ];
    });

    // データが空の場合リダイレクト
    if (empty($data)) {
        header("Location: vote.php");
        exit;
    }

    // data/ ディレクトリ内に保存
    $fileName = "{$dir}/{$senkyoku_id}.json";

    // TODO: 配列をJSONに変換: UNICODE対応、整形して保存
    // $json = json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

    // TODO: JSONファイルに書き込み
    // file_put_contents($fileName, $json);

    // 完了時に選挙区IDをクエリパラメータで渡す
    header("Location: vote.php?last_id={$senkyoku_id}");
} catch (\Exception $e) {
    header("Location: vote.php");
}

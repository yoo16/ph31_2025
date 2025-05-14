<?php
// ページ設定
const SITE_TITLE = "My Page";

// BASE_URL を定義（常にルートからの相対パス）
define('BASE_URL', getBaseUrl());

// パス設定
const BASE_DIR = __DIR__;
const APP_DIR = __DIR__ . "/app/";
const LIB_DIR = __DIR__ . "/lib/";
const VIEW_DIR = APP_DIR . "views/";
const MODEL_DIR = APP_DIR . "models/";
const LAYOUT_DIR = VIEW_DIR . "layouts/";
const COMPONENT_DIR = APP_DIR . "components/";

// BASE_URL のカスタマイズ
// const BASE_URL = "http://localhost/myproject/";

// セッションの開始
session_start();
// セッションの再生成
session_regenerate_id(true);

// ライブラリの読み込み
require_once LIB_DIR . 'View.php';

// モデルの読み込み
require_once MODEL_DIR . 'User.php';

// BASE_URL を動的に取得
function getBaseUrl()
{
    $basePath = str_replace(
        str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'])),
        '',
        str_replace('\\', '/', __DIR__)
    );
    // BASE_URL を定義（常にルートからの相対パス）
    return rtrim($basePath, '/') . '/';
}

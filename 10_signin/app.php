<?php
// セッション開始
session_start();
session_regenerate_id(true);

// サイトタイトル
const SITE_TITLE = "My Form";

// アプリケーションのルートディレクトリパス
const BASE_DIR = __DIR__;
const COMPONENT_DIR = BASE_DIR . "/app/components/";
const MODEL_DIR = BASE_DIR . "/app/models/";

// モデル読み込み
require_once MODEL_DIR . 'User.php';
require_once MODEL_DIR . 'AuthUser.php';

// BASE_URL を定義（常にルートからの相対パス）
define('BASE_URL', getBaseUrl());
// BASE_URL をカスタム定義
// const BASE_URL = "http://localhost/fin/10_signin/";

// BASE_URL を動的に取得
function getBaseUrl()
{
    $basePath = str_replace(
        str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT'])),
        '',
        str_replace('\\', '/', __DIR__)
    );
    // BASE_URL を定義（常にルートからの相対パス）
    return rtrim($basePath, '/');
}

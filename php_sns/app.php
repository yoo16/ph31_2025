<?php
// 設定ファイルを読み込み
require_once "env.php";

// セッション開始
session_start();
session_regenerate_id(true);

// アプリケーションのルートディレクトリパス
const BASE_DIR = __DIR__;
// app/ ディレクトリパス
const APP_DIR = __DIR__ . "/app/";
// lib/ ディレクトリパス
const LIB_DIR = __DIR__ . "/lib/";
// components/ ディレクトリパス
const COMPONENT_DIR = __DIR__ . "/components/";

// upload image base path
const UPLOADS_BASE = "images/uploads/";
// profile image base path
const PROFILE_BASE = "images/profile/";
// upload image dir
const UPLOADS_DIR = __DIR__ . UPLOADS_BASE;
// profile image dir
const PROFILE_DIR = __DIR__ . PROFILE_BASE;

// ライブラリ読み込み
require_once LIB_DIR . 'Database.php';
require_once LIB_DIR . 'Sanitize.php';
require_once LIB_DIR . 'File.php';

// モデルクラスの読み込み
require_once APP_DIR . 'models/User.php';
require_once APP_DIR . 'models/AuthUser.php';
require_once APP_DIR . 'models/Tweet.php';
require_once APP_DIR . 'models/Like.php';

if (!defined('BASE_URL')) define('BASE_URL', getBaseUrl());

function getBaseUrl()
{
    $documentRoot = str_replace('\\', '/', realpath($_SERVER['DOCUMENT_ROOT']));
    $directory = str_replace('\\', '/', __DIR__);
    $basePath = str_replace($documentRoot, '', $directory);
    // BASE_URL を定義（常にルートからの相対パス）
    return rtrim($basePath, '/') . '/';
}

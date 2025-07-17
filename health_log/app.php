<?php
// 環境設定を読み込む
require_once 'env.php';
// データベース接続を読み込む
require_once 'lib/Database.php';
// サイトタイトル
const SITE_TITLE = 'KENKO LOG';
// セッション開始
session_start();
session_regenerate_id(true);
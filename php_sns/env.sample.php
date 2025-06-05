<?php
// Database
const DB_CONNECTION = 'mysql';
const DB_HOST = '127.0.0.1';
const DB_PORT = 3306;
const DB_DATABASE = 'php_sns';
const DB_USERNAME = 'root';
// XAMP
const DB_PASSWORD = '';
// MAMP or Other
// const DB_PASSWORD = 'root';

// アプリキー
const APP_KEY = "php_sns";

// サイトタイトル
const SITE_TITLE = "PHP SNS";

// サイトベースURL
define('BASE_URL', rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'));
// 手動で設定する場合
// const BASE_URL = "http://localhost/php_sns/";
<?php
/**
 * サニタイズ関数1
 * @param string $str サニタイズする文字列
 * @return string サニタイズ後の文字列
 */
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/**
 * サニタイズ関数2
 * @param mixed $data サニタイズするデータ
 * @return mixed サニタイズ後のデータ
 */
function sanitize($data)
{
    // 配列の場合、再帰的にサニタイズ
    if (is_array($data)) {
        return array_map('sanitize', $data);
    }
    // サニタイズ処理
    // htmlspecialchars() を使用して、HTMLエスケープを行う
    // trim() を使用して、前後の空白を削除
    // ENT_QUOTES を指定して、シングルクォートとダブルクォートをエスケープ
    return trim(h($data, ENT_QUOTES, 'UTF-8'));
}

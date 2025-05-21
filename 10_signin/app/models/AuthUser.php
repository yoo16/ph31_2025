<?php
class AuthUser extends User
{
    private static $key = 'auth_user';

    public static function check()
    {
        // セッションからユーザ情報を取得
        if (isset($_SESSION[self::$key])) {
            return $_SESSION[self::$key];
        }
    }

    public static function set($user)
    {
        // セッションにユーザ情報を保存
        $_SESSION[self::$key] = $user;
    }

    public static function clear()
    {
        // セッションからユーザ情報を削除
        if (isset($_SESSION[self::$key])) {
            unset($_SESSION[self::$key]);
        }
    }
}

<?php
require './vendor/autoload.php';

// TODO: PHPMailer と Dotenv の名前空間をインポート
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

class Contact
{
    // PHPMailer インスタンス
    private $mailer;
    // メールテンプレートのパス
    private $template = __DIR__ . "/templates/contact_mail.html";

    // 環境変数をクラスメンバで保持
    private string $from_address;
    private string $from_name;
    private string $host;
    private string $username;
    private string $password;
    private string $encryption;
    private int    $port;

    private string $subject = '[お問い合わせ]ご確認のメール';

    public function __construct()
    {
        // .env 読み込み
        $dotenv = Dotenv::createImmutable(__DIR__);
        $dotenv->load();

        // クラスメンバに $_ENV の値を代入
        // TODO: 送信元アドレス MAIL_FROM_ADDRESS
        $this->from_address = $_ENV['MAIL_FROM_ADDRESS'];
        // TODO: 送信元名前: MAIL_FROM_NAME
        $this->from_name    = $_ENV['MAIL_FROM_NAME'];
        // TODO: SMTPサーバー: MAIL_HOST
        $this->host         = $_ENV['MAIL_HOST'];
        // TODO: SMTPユーザー名: MAIL_USERNAME
        $this->username     = $_ENV['MAIL_USERNAME'];
        // TODO: SMTPパスワード: MAIL_PASSWORD
        $this->password     = $_ENV['MAIL_PASSWORD'];
        // TODO: 暗号化方式: MAIL_ENCRYPTION
        $this->encryption   = $_ENV['MAIL_ENCRYPTION'];
        // TODO: ポート番号: MAIL_PORT
        $this->port         = $_ENV['MAIL_PORT'];

        $this->setupMailer();
    }

    /**
     * メーラー初期設定
     */
    private function setupMailer(): void
    {
        $this->mailer = new PHPMailer(true);
        $this->mailer->isSMTP();
        $this->mailer->SMTPAuth   = true;
        // TODO: SMTPサーバーの設定
        $this->mailer->Host       = $this->host;
        // TODO: 暗号化方式の設定
        $this->mailer->Username   = $this->username;
        // TODO: SMTPユーザー名の設定
        $this->mailer->Password   = $this->password;
        // TODO: エンクリプションの設定
        $this->mailer->SMTPSecure = $this->encryption;
        // TODO: ポート番号の設定
        $this->mailer->Port       = $this->port;
        // 文字コード
        $this->mailer->CharSet    = 'UTF-8';
        // エンコーディング
        $this->mailer->Encoding   = 'base64';
    }

    /**
     * 入力バリデーション
     */
    public function validate($name, $email, $body)
    {
        if (empty($name) || empty($email) || empty($body)) {
            return "すべてのフィールドを入力してください。";
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "有効なメールアドレスを入力してください。";
        }
        return '';
    }

    /**
     * テンプレートを読み込んで置換
     */
    private function loadTemplate($values)
    {
        // テンプレート読み込み
        $template = file_get_contents($this->template);
        // テンプレートに変数を置換
        foreach ($values as $key => $value) {
            $template = str_replace("{{{$key}}}", $value, $template);
        }
        return $template;
    }

    /**
     * メール送信
     */
    public function send($name, $email, $body)
    {
        try {
            // HTMLメール作成
            $html = $this->loadTemplate([
                "name"  => $name,
                "email" => $email,
                "body"  => nl2br($body),
            ]);
            // TODO: 送信元アドレスと名前: setFrom(): from_address, from_name
            $this->mailer->setFrom($this->from_address, $this->from_name);
            // TODO: 送信先アドレスと名前: addAddress(): email, name
            $this->mailer->addAddress($email, $name);
            // TODO: 返信先アドレスと名前: addReplyTo(): from_address, from_name
            $this->mailer->addReplyTo($this->from_address, $this->from_name);
            // TODO: HTML形式を有効に: isHTML(true)
            $this->mailer->isHTML(true);
            // TODO: メールタイトル: Subject
            $this->mailer->Subject = $this->subject;
            // TODO: メール本文: Body
            $this->mailer->Body = $html;

            // TODO: メール送信: send()
            // TODO: 送信成功したら true を返す
            return $this->mailer->send();
        } catch (Exception $e) {
            return $this->mailer->ErrorInfo;
        }
    }
}
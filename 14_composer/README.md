## GD
### php.ini の修正
```ini
extension=gd
```

## ライブラリインストール
### .env
```bash
composer require vlucas/phpdotenv
```

### QRCode
```bash
composer require endroid/qr-code
```

### Parsedown
```bash
composer require erusev/parsedown
```

### PHP Mailer
```bash
composer require phpmailer/phpmailer
```

## Gmail サーバの利用
- 「安全性の低いアプリの許可」が必要（またはアプリパスワード）
- Host: smtp.gmail.com
- Port: 587

1. Google アカウントにのセキュリティにログイン
2. 2段階認証を有効化
3. 「アプリパスワード」にアクセス
https://myaccount.google.com/apppasswords
4.  メールアプリ用の 16桁のアプリパスワード を発行
5. .env の MAIL_PASSWORD に設定

## OAuth(Google)
```bash
composer require league/oauth2-google
```

### Google API Console で認証情報を取得
1. アクセス
https://console.cloud.google.com/

2. OAuth2 クライアントIDを作成（リダイレクトURIを指定）

3. client_id と client_secret を控えておく
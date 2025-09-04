## GD
## ライブラリインストール
### .env
```bash
composer require vlucas/phpdotenv
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
https://myaccount.google.com/security
2. 2段階認証を有効化
3. 「アプリパスワード」にアクセス
https://myaccount.google.com/apppasswords
4.  メールアプリ用の 16桁のアプリパスワード を発行
5. .env の MAIL_PASSWORD に設定

## OAuth(Google)
```bash
composer require league/oauth2-google
```
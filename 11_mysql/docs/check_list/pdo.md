## ✅ PDO基本利用＆DB接続のプログラムチェックリスト

## 1. 事前確認
- [ ] Webサーバ（Apache, Nginx）の起動確認
- [ ] MySQLサーバの起動確認

---
## 2. DB設定ファイル作成 (`env.php`)

- [ ] `env.php` で設定を外部化
    ```php
    const DB_CONNECTION = 'mysql';
    const DB_HOST = '127.0.0.1';
    const DB_PORT = '3306';
    const DB_USERNAME = 'root';
    // XAMPP
    const DB_PASSWORD = '';
    // MAMP
    // const DB_PASSWORD = '';
    const DB_DATABASE = 'php_sns';
    ```
---

## 3. PDO接続プログラム (`connect_test.php`)
- [ ] `connect_test.php` の用意
- [ ] `env.php` の読み込み
    ```php
    require_once 'env.php';
    ```
- [ ] DSNの設定
    ```php
    $dsn = "{$db_connection}:dbname={$db_name};host={$db_host};port={$db_port};charset=utf8;";
    ```
- [ ] PDOインスタンス生成
    ```php
    $pdo = new PDO($dsn, $db_user, $db_password);
    ```
- [ ] エラー処理設定
    ```php
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    ```
- [ ] エミュレーション無効化（セキュリティ向上）
    ```php
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    ```
- [ ] PDO接続を Try-Catch で実行
- [ ] PDOオブジェクトの接続結果を画面に表示
---

## 4. クラス化・モジュール化（Databaseクラス）
- [ ] `lib/Database.php` で Databaseクラス作成
- [ ] シングルトンパターンを採用
- [ ] PDO接続を Try-Catch で実行
- [ ] `connect_test_for_module.php` の用意
- [ ] `lib/Database.php` の読み込み
    ```php
    require_once 'lib/Database.php';
    ```
- [ ] `Database`クラスからシングルトンでPDO接続
    ```php
    $pdo = Database::getInstance();
    ```
- [ ] クラス化されたPDO接続の確認
---

### 5. ユーザ一覧
- [ ] `select_users.php` の作成
- [ ] `env.php` の読み込み
- [ ] `lib/Database.php` の読み込み
- [ ] `get()` メソッドの定義
- [ ] `Database` クラスのシングルトンでPDO接続
- [ ] ユーザデータ取得のSQL作成
- [ ] `fetchAll()` でユーザデータ一括取得
- [ ] フェッチモード `PDO::FETCH_ASSOC` を基本指定
- [ ] `query()` でユーザデータ取得
- [ ] `get()` を実行してユーザーデータ取得
- [ ] ユーザーデータをHTMLレンダリング

### 3. ユーザ検索
- [ ] `find_user.php` の作成
- [ ] ID検索フォーム作成
- [ ] `env.php` の読み込み
- [ ] `lib/Database.php` の読み込み
- [ ] `GET`パラメータからユーザID `id` を取得
- [ ] `find()` メソッドの定義
- [ ] パラメータを含むSQLはプレスホルダーで作成
  OK:
  ```php
  $sql = "SELECT * FROM users WHERE id = :id;";
  ```
  NG:
  ```php
  $sql = "SELECT * FROM users WHERE id = {$id}";
  ```
- [ ] SQL文にユーザー入力値を直接文字列結合しない
- [ ] `prepare()` でSQL準備
- [ ] `execute()` でSQL実行
- [ ] `execute()` でパラメータのバインド（連想配列）
- [ ] PDOの例外処理 `try-catch`, `PDOException` を実装
- [ ] ユーザーデータをHTMLレンダリング
- [ ] 送信パラメータで SQLインジェクションテストを実施する
    ```txt
    '' OR 1=1;--
    ```
---

## 4. ユーザデータ追加
- [ ] 入力フォームに必要なカラム用の`name`属性を指定
- [ ] `method="post"`を設定
- [ ] POSTリクエストか判定
- [ ] `insert()` の定義
- [ ] パスワードのハッシュ化
- [ ] SQL文に指定したいテーブルとカラムを記述
- [ ] `prepare()` でSQL準備
- [ ] `execute()` でSQL実行
- [ ] `execute()` でパラメータのバインド（連想配列）
- [ ] 成功時の処理で `lastInsertId()` でユーザIDを取得
- [ ] エラー処理（try-catch等）を実装
- [ ] `insert()` の実行
- [ ] ユーザデータ追加の確認
- [ ] UNIQUE制約に違反した場合、PDOExceptionが発生

## 5. ユーザデータ更新
- [ ] 入力フォームに`id`、`account_name` を指定
- [ ] `method="post"`を設定
- [ ] POSTリクエストか判定
- [ ] `update()` の定義
- [ ] SQL文にテーブルとカラム `id`、`account_name` を記述
- [ ] `prepare()` でSQL準備
- [ ] `execute()` でSQL実行
- [ ] `execute()` でパラメータのバインド（連想配列）
- [ ] エラー処理（try-catch等）を実装
- [ ] `update()` の実行
- [ ] ユーザデータ更新の確認
- [ ] UNIQUE制約に違反した場合、PDOExceptionが発生

### ✅ SQL構文
- [ ] 必ず条件（WHERE）を指定する（誤削除防止）
```sql
DELETE FROM users WHERE id = :id;
```

### ✅ フォーム設計
- [ ] 削除対象のIDをフォームに含める
- [ ] method="post"を設定
```html
<form method="post">
    <input type="number" name="id" placeholder="削除するIDを入力">
    <button type="submit">削除</button>
</form>
```

### ✅ PHPでのデータ取得と削除
- [ ] POSTメソッドか確認
- [ ] IDのバリデーション（数値か、存在するIDかなど）
```php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = (int)$_POST['id'];
    // バリデーション処理
}
```

### ✅ クエリ実行
- [ ] プリペアドステートメントを利用（SQLインジェクション対策）
- [ ] エラー処理を実装
```php
$sql = "DELETE FROM users WHERE id = :id;";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
```

---

## ⚙️ MVC・ORM、フレームワークの検討

- [ ] 大規模開発時はMVCパターンやORMを活用する
- [ ] 独自ライブラリではなく、Laravel等のフレームワークを積極的に採用
- [ ] フレームワークのCRUD機能やORMを活用してコードをシンプルにする

|項目|推奨理由|
|---|---|
|✅ MVC|関心事を分離、保守性を向上|
|✅ ORM|DBアクセスを簡潔にし、セキュリティ向上|
|✅ Laravel|豊富な機能、セキュリティ、学習リソース多数|

**[Laravel公式サイト](https://laravel.com/)**

---

## 🚨 安全・セキュリティ確認

- [ ] 全ての処理にプリペアドステートメントを使用（SQLインジェクション防止）
- [ ] 入力値のバリデーションを厳密に行う（型チェック、長さ制限、形式チェック）
- [ ] パスワードは必ずハッシュ化（`password_hash()`）

---

このチェックリストに沿って確認を行うことで、安全性、保守性、効率性に優れたCRUDプログラムの実装が可能です。
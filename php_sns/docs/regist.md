```mermaid
flowchart TD
    A[ユーザ登録トップ] 
    A -- リダイレクト --> B[入力画面]
    B --> C{登録処理}
    C -- Yes --> D[ログイン画面]
    C -- No --> B
    B -- 会員登録済み --> D
```
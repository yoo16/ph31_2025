```mermaid
flowchart TD
    A[ログイントップ] 
    A -- リダイレクト --> B[入力画面]
    B --> C{認証処理}
    C -- Yes --> D[メインページ]
    C -- No --> B
    B -- 会員登録なし --> E[会員登録画面]
```
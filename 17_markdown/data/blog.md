# ようこそ

こんにちは、山田太郎です。  
このブログでは、日々の学びや気づき、技術メモを中心に発信しています。

---

## 自己紹介

- **名前**：山田 太郎  
- **住まい**：東京都  
- **職業**：Webエンジニア  
- **好きな技術**：PHP / Laravel / React / Next.js

---

## 最近の取り組み

### 🔧 自作アプリ：Bakery Order System

小さなベーカリー向けの注文管理システムを開発中です。

- QRコードを使った座席管理
- リアルタイムで注文確認
- 店舗管理者向けダッシュボード

使用技術：
- フロントエンド：React + Vite
- バックエンド：PHP + Laravel
- データベース：MySQL + Prisma

---

## 学んだこと

最近、Next.jsで画像アップロード機能を実装しました。  
S3連携やプレビュー表示の方法なども整理しています。

```javascript
const handleUpload = async (file) => {
  const formData = new FormData();
  formData.append("image", file);
  const res = await fetch("/api/upload", {
    method: "POST",
    body: formData,
  });
};
```

---

## おわりに

技術に関するメモや日常の小さな気づきも発信していきます。  
読んでくださってありがとうございます！

👉 ご連絡は [こちらのメール](mailto:yamada@example.com) までお気軽にどうぞ！
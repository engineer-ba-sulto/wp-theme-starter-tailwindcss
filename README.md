# WordPress Theme Starter with Tailwind CSS

WordPress テーマのスターターテンプレートです。Tailwind CSS v4 を使用してスタイリングを行います。

## 前提条件

以下の環境が必要です：

- [Node.js](https://nodejs.org/)（インストール済みであること）
- [Bun](https://bun.sh/)（JavaScript ランタイム）

### 推奨 VS Code 拡張機能

このプロジェクトでは、以下の VS Code 拡張機能の使用を推奨しています：

- **[PHP Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client)**: PHP のコード補完、構文解析、フォーマット機能を提供します

プロジェクトを VS Code で開くと、拡張機能のインストールを促す通知が表示されます。手動でインストールする場合は、VS Code の拡張機能マーケットプレイスから「PHP Intelephense」を検索してインストールしてください。

## クイックスタート

### 1. リポジトリのクローン

```sh
git clone <repository-url>
cd wp-theme-starter-tailwindcss
```

### 2. 依存関係のインストール

```sh
bun install
```

### 3. Tailwind CSS のビルド

```sh
bun run build:css
```

これで基本的なセットアップは完了です。開発を開始する場合は、ウォッチモードを起動してください：

```sh
bun run watch:css
```

## セットアップ

### 1. Tailwind CSS のインストール

```sh
bun add -D tailwindcss@^4.0.0 @tailwindcss/cli@^4.0.0
```

### 2. input.css の設定

`css/input.css` ファイルに以下のコードを追加します：

```css:css/input.css
@import "tailwindcss";
```

#### 設定の説明

- `@import "tailwindcss"`: Tailwind CSS のコア機能をインポートします

## 使用方法

### ビルド（1 回のみ）

```sh
bun run build:css
```

### ウォッチモード（開発中）

```sh
bun run watch:css
```

ウォッチモードでは、`input.css` ファイルや PHP ファイルに変更があった場合、自動的に再ビルドされます。テーマ開発中はこのコマンドを実行しておくと便利です。

### 直接 CLI を実行する方法

```sh
npx @tailwindcss/cli -i ./css/input.css -o ./css/tailwind.css -m --watch
```

#### コマンドオプションの説明

- `@tailwindcss/cli`: Tailwind CSS のビルドプロセスを開始するコマンド（v4 では専用パッケージを使用）
- `-i ./css/input.css`: 入力ファイルを指定
- `-o ./css/tailwind.css`: 出力ファイルを指定（生成された CSS は `css/tailwind.css` として保存されます）
- `-m`: ミニファイオプション（生成される CSS ファイルを圧縮）
- `--watch`: ウォッチモードを有効化（ファイル変更時に自動再ビルド）

## ドキュメント

詳細なドキュメントは `docs/` ディレクトリにあります：

- **[メタタグ実装ドキュメント](./docs/META-TAGS-DOCUMENTATION.md)**: SEO 対策用メタタグの実装方法と、使用している WordPress テンプレートタグについての詳細な説明

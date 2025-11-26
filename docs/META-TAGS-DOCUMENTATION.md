# メタタグ実装ドキュメント

## 概要

このドキュメントでは、WordPress テーマで使用している SEO 対策用メタタグの実装方法と、使用しているテンプレートタグについて説明します。

## ファイル構成

- **テンプレートパーツ**: `template-parts/meta-tags.php`
- **読み込み元**: `header.php`

## 実装した主なテンプレートタグ

### 1. `bloginfo('charset')`

- **用途**: サイトの文字コードを取得
- **使用箇所**: `<meta charset>` タグ
- **説明**: WordPress の設定から文字コード（通常は UTF-8）を取得します

### 2. `get_bloginfo('name')`

- **用途**: サイト名を取得
- **使用箇所**: サイト名の表示、OGP の `og:site_name`
- **説明**: WordPress 管理画面の「設定 > 一般」で設定されたサイト名を取得します

### 3. `get_bloginfo('description')`

- **用途**: サイトの説明（キャッチフレーズ）を取得
- **使用箇所**: メタディスクリプション、OGP の `og:description`（ホームページの場合）
- **説明**: WordPress 管理画面の「設定 > 一般」で設定されたサイトの説明を取得します

### 4. `home_url()`

- **用途**: サイトのホーム URL を取得
- **使用箇所**: OGP の `og:url`（ホームページの場合）
- **説明**: サイトのトップページの URL を取得します

### 5. `get_the_title()`

- **用途**: 投稿・固定ページのタイトルを取得
- **使用箇所**: OGP の `og:title`（投稿・固定ページの場合）
- **説明**: 現在表示中の投稿または固定ページのタイトルを取得します

### 6. `get_the_excerpt()`

- **用途**: 投稿の抜粋を取得
- **使用箇所**: メタディスクリプション、OGP の `og:description`（投稿・固定ページの場合）
- **説明**: 投稿の抜粋を取得します。抜粋が設定されていない場合は、本文の最初の 30 文字を使用します

### 7. `wp_trim_words()`

- **用途**: テキストを指定文字数に切り詰める
- **使用箇所**: 抜粋が設定されていない場合の本文の切り詰め
- **説明**: 本文を 30 文字に切り詰めてメタディスクリプションとして使用します

### 8. `get_permalink()`

- **用途**: 投稿・固定ページのパーマリンクを取得
- **使用箇所**: OGP の `og:url`（投稿・固定ページの場合）
- **説明**: 現在表示中の投稿または固定ページの URL を取得します

### 9. `get_the_post_thumbnail_url()`

- **用途**: アイキャッチ画像の URL を取得
- **使用箇所**: OGP の `og:image`（投稿・固定ページの場合）
- **説明**: 投稿に設定されたアイキャッチ画像の URL を取得します。サイズは `large` を指定しています

### 10. `wp_get_document_title()`

- **用途**: WordPress が生成するタイトルを取得
- **使用箇所**: `<title>` タグ、その他ページの `og:title`
- **説明**: WordPress が自動生成するページタイトルを取得します（サイト名 + ページタイトルの形式）

### 11. `is_single()`

- **用途**: 単一投稿ページかどうかを判定
- **使用箇所**: ページタイプの判定
- **説明**: 現在のページが単一投稿ページかどうかを判定します

### 12. `is_page()`

- **用途**: 固定ページかどうかを判定
- **使用箇所**: ページタイプの判定
- **説明**: 現在のページが固定ページかどうかを判定します

### 13. `is_home()`

- **用途**: ブログのホームページかどうかを判定
- **使用箇所**: ページタイプの判定
- **説明**: 現在のページがブログのホームページ（投稿一覧ページ）かどうかを判定します

### 14. `is_front_page()`

- **用途**: フロントページかどうかを判定
- **使用箇所**: ページタイプの判定
- **説明**: 現在のページがフロントページ（トップページ）かどうかを判定します

### 15. `esc_attr()`

- **用途**: HTML 属性用のエスケープ処理
- **使用箇所**: メタタグの `content` 属性
- **説明**: HTML 属性に使用する値を安全にエスケープします

### 16. `esc_url()`

- **用途**: URL 用のエスケープ処理
- **使用箇所**: URL を含むメタタグ
- **説明**: URL を安全にエスケープします

### 17. `esc_html()`

- **用途**: HTML 用のエスケープ処理
- **使用箇所**: `<title>` タグ
- **説明**: HTML として出力する値を安全にエスケープします

## 実装内容

### ページタイプ別の動作

#### 1. 投稿・固定ページ（`is_single()` または `is_page()`）

- **タイトル**: 投稿/ページのタイトル
- **説明**: 抜粋（設定されていない場合は本文の最初の 30 文字）
- **URL**: 投稿/ページのパーマリンク
- **画像**: アイキャッチ画像（設定されている場合）
- **OG タイプ**: `article`

#### 2. ホームページ（`is_home()` または `is_front_page()`）

- **タイトル**: サイト名
- **説明**: サイトの説明（キャッチフレーズ）
- **URL**: ホーム URL
- **画像**: なし
- **OG タイプ**: `website`

#### 3. その他のページ（アーカイブなど）

- **タイトル**: WordPress が生成するタイトル
- **説明**: サイトの説明（キャッチフレーズ）
- **URL**: 現在のページの URL
- **画像**: なし
- **OG タイプ**: `website`

### 生成されるメタタグ

```html
<!-- 基本メタタグ -->
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="ページの説明文" />

<!-- Open Graph タグ -->
<meta property="og:title" content="ページタイトル" />
<meta property="og:description" content="ページの説明文" />
<meta property="og:type" content="article または website" />
<meta property="og:url" content="ページのURL" />
<meta property="og:image" content="画像のURL" />
<!-- アイキャッチ画像がある場合のみ -->
<meta property="og:site_name" content="サイト名" />
<meta property="og:locale" content="ja_JP" />

<!-- タイトルタグ -->
<title>ページタイトル</title>
```

### セキュリティ対策

すべての出力値に対して適切なエスケープ処理を実装しています：

- **`esc_attr()`**: HTML 属性用
- **`esc_url()`**: URL 用
- **`esc_html()`**: HTML コンテンツ用

これにより、XSS（Cross-Site Scripting）攻撃を防ぎます。

## 使用方法

### テンプレートパーツの読み込み

`header.php` で以下のようにテンプレートパーツを読み込みます：

```php
<?php get_template_part("template-parts/meta-tags"); ?>
```

### カスタマイズ方法

`template-parts/meta-tags.php` を編集することで、メタタグの生成ロジックをカスタマイズできます。

#### 例：デフォルト画像を設定する場合

```php
// デフォルト画像のURLを設定
$default_image = get_theme_file_uri("/images/default-og-image.jpg");
$page_image = get_the_post_thumbnail_url(null, "large") ?: $default_image;
```

#### 例：カスタムフィールドからメタ情報を取得する場合

```php
// カスタムフィールドからメタディスクリプションを取得
$custom_description = get_post_meta(get_the_ID(), "meta_description", true);
if ($custom_description) {
	$page_description = $custom_description;
}
```

## 注意事項

1. **アイキャッチ画像**: 投稿にアイキャッチ画像が設定されていない場合、`og:image` タグは出力されません
2. **抜粋**: 投稿に抜粋が設定されていない場合、本文の最初の 30 文字が使用されます
3. **URL**: アーカイブページなどの場合、`$_SERVER['REQUEST_URI']` を使用しているため、適切に動作することを確認してください

## 参考リンク

- [WordPress Codex - Template Tags](https://codex.wordpress.org/Template_Tags)
- [WordPress Developer Resources - Template Tags](https://developer.wordpress.org/themes/basics/template-tags/)
- [Open Graph Protocol](https://ogp.me/)
